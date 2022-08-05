import { React, useEffect, useState } from 'react'
import AxiosConfig from '../axiosConfig'
import { useNavigate } from "react-router-dom"

import List from './ApplicationClubList'

const DirectorApplicationSideNav = (props) => {
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);
    let user = JSON.parse(localStorage.getItem('user'))
    const [clubs, setClubs] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        AxiosConfig.get("director/application")
            .then(resp => {
                setClubs(resp.data.clubs);
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
                <div className="col-lg-3 border-end-lg">...Data Loading.....</div>
            ) : (
                <div className="col-lg-3 border-end-lg">
                    <div className="aside-content">
                        <div className="d-flex align-items-center justify-content-between">
                            <div className="order-first">
                                <h4>Application Service</h4>
                            </div>
                        </div>
                        <div className="aside-header mt-3">
                            <div className="d-flex justify-content-between align-items-center pb-2 mb-2">
                                <div className="d-flex align-items-center">
                                    <figure className="me-2 mb-0">
                                        <img src={user.images} className="img-sm rounded-circle" alt="profile" />
                                        <div className="status online"></div>
                                    </figure>
                                    <div>
                                        <h6>{user.name}</h6>
                                        <p className="text-muted tx-13">Director</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="email-aside-nav collapse mt-2">
                            <ul className="nav flex-column">
                                <li className="nav-item" >
                                    <a className="nav-link d-flex align-items-center" href="{{route('directorAllApplication')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox icon-lg me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                        All Applications
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div className="tab-content mt-3">
                            <div className="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                                <div className="border-bottom">
                                    <p className="text-muted mb-2">Clubs</p>

                                </div>
                                <div className="email-list">
                                    {
                                        clubs.map(club => (
                                            <List id={club.id} name={club.name}></List>
                                        ))
                                    }
                                </div>
                            </div>

                        </div>
                    </div>
                </div >
            )}
        </>
    )
}

export default DirectorApplicationSideNav