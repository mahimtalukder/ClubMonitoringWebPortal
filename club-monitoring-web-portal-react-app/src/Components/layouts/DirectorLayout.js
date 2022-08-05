import { React, useEffect } from 'react'
import DirectorSideNav from '../inc/DirectorSideNav'
import DirectorTopNav from '../inc/DirectorTopNav'
import Footer from '../inc/Footer'
import Dashboard from '../Director/Dashboard'
import { useNavigate } from "react-router-dom"
import AxiosConfig from '../axiosConfig'

function DirectorLayout(props) {
    const navigate = useNavigate();
    useEffect(() => {
        if (props.path == 'dashboard') {
            AxiosConfig.get("director/dashboard")
                .then(resp => {
                    console.log(resp.data);
                }).catch(err => {
                    navigate("/signin");
                    console.log(err);
                });
        }
    }, []);

    const component = () => {
        if (props.path == 'dashboard') {
            return <Dashboard />;
        } else if (props.path == '') {
            return "";
        }
    }
    return (
        <div className="main-wrapper">

            <DirectorSideNav />

            <div className="page-wrapper">

                <DirectorTopNav />

                <div className="page-content">
                    {component()}

                </div>
                <Footer />

            </div>
        </div>
    )
}

export default DirectorLayout