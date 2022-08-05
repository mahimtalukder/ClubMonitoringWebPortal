import { React, useEffect, useState } from 'react'
import AxiosConfig from '../axiosConfig'
import List from './ApplicationList'
import { useNavigate } from "react-router-dom"

import DirectorApplicationSideNav from "../inc/DirectorApplicationSideNav"

const Application = () => {
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [clubs, setClubs] = useState([]);
    const [applications, setApplications] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        AxiosConfig.get("director/application")
            .then(resp => {
                setClubs(resp.data.clubs);
                setApplications(resp.data.applications);
                setLoading(false);
            }).catch(err => {
                setLoading(false);
                navigate("/signin");
                console.log(err);
            });
    };



    return (
        <>
            {loading ? (
                <div>...Data Loading.....</div>
            ) : (
                <div className="row inbox-wrapper">
                    <div className="col-lg-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <DirectorApplicationSideNav clubs={clubs} />
                                    <div className="col-lg-9">
                                        <div className="p-3 border-bottom">
                                            <div className="row align-items-center">
                                                <div className="col-lg-6">
                                                    <div className="d-flex align-items-end mb-2 mb-md-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="feather feather-inbox text-muted me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                                        <h4 className="me-1">Application</h4>
                                                    </div>
                                                </div>
                                                <div className="col-lg-6">
                                                    <form method="get" action="">
                                                        <div className="input-group">
                                                            <input className="form-control" type="text" placeholder="Search applications..." name="search" />
                                                            <button class="btn btn-light btn-icon" type="submit" id="button-search-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="email-list">
                                            {
                                                applications.map(application => (
                                                    <List is_approved={application.is_approved} subject={application.subject} created_at={application.created_at} description={application.description}></List>
                                                ))
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </>
    )
}

export default Application
