import { React, useEffect, useState } from 'react'
import { useNavigate } from "react-router-dom"
import AxiosConfig from '../axiosConfig'

import DirectorSideNav from '../inc/DirectorSideNav'
import DirectorTopNav from '../inc/DirectorTopNav'
import Footer from '../inc/Footer'
import Dashboard from '../Director/Dashboard'
import AllAplication from '../Director/Application'

function DirectorLayout(props) {
    const component = () => {
        if (props.path == 'dashboard') {
            return <Dashboard />;
        } else if (props.path == 'allapplication') {
            return <AllAplication />;
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