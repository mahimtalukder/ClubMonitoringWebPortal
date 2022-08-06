import { React, useEffect } from "react";
import ExecutiveSideNav from "../inc/ExecutiveSideNav";
import ExecutiveTopNav from "../inc/ExecutiveTopNav";
import Footer from "../inc/Footer";
import Dashboard from "../Executive/Dashboard";
import { useNavigate } from "react-router-dom";
import AxiosConfig from "../axiosConfig";
import ExecutiveProfile from "../Executive/ExecutiveProfile";

function ExecutiveLayout(props) {
    const navigate = useNavigate();
    useEffect(() => {
        if (props.path == "dashboard") {
            AxiosConfig.get("executive/dashboard")
                .then((resp) => {
                    console.log(resp.data);
                })
                .catch((err) => {
                    navigate("/signin");
                    console.log(err);
                });
        }
    }, []);

    const component = () => {
        console.log(props.path);
        if (props.path == "dashboard") {
            return <Dashboard />;
        } else if (props.path == "profile") {
            return <ExecutiveProfile />;
        }
    };
    return (
        <div className="main-wrapper">
            <ExecutiveSideNav />

            <div className="page-wrapper">
                <ExecutiveTopNav />

                <div className="page-content">{component()}</div>
                <Footer />
            </div>
        </div>
    );
}

export default ExecutiveLayout;
