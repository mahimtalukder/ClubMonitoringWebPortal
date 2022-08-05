import { React, useEffect } from 'react'
import AdminSideNav from '../inc/AdminSideNav'
import AdminTopNav from '../inc/AdminTopNav'
import Footer from '../inc/Footer'
import Dashboard from '../Admin/Dashboard'
import { useNavigate } from "react-router-dom"
import AxiosConfig from '../axiosConfig'

function AdminLayouts(props) {
    const navigate = useNavigate();
    useEffect(() => {
        if (props.path == 'dashboard') {
            AxiosConfig.get("admin/dashboard")
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
        <div class="main-wrapper">

            <AdminSideNav />

            <div class="page-wrapper">

                <AdminTopNav />

                <div class="page-content">
                    {component()}

                </div>
                
                <Footer />

            </div>
        </div>
    )
}

export default AdminLayouts