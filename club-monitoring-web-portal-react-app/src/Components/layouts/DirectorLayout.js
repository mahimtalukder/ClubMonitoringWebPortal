import { React, useEffect, useState } from "react";
import DirectorSideNav from "../inc/DirectorSideNav";
import DirectorTopNav from "../inc/DirectorTopNav";
import Footer from "../inc/Footer";
import Dashboard from "../Director/Dashboard";
import DirectorViewProfile from "../Director/DirectorViewProfile";
import AllAplication from "../Director/Application";
import ApplicationRead from "../Director/ApplicationRead"

function DirectorLayout(props) {
    const component = () => {
        if (props.path == "dashboard") {
            return <Dashboard />;
        } else if (props.path == "profile") {
            return <DirectorViewProfile />;
        } else if (props.path == "allapplication") {
            return <AllAplication />;
        } else if (props.path == "applicationRead") {
            return <ApplicationRead />;
        }
    };

    return (
        <div className="main-wrapper">
            <DirectorSideNav />

            <div className="page-wrapper">
                <DirectorTopNav />

                <div className="page-content">{component()}</div>
                <Footer />
            </div>
        </div>
    );
}

export default DirectorLayout;
