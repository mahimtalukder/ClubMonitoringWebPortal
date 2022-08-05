import { React, useEffect } from "react";
import MemberSideNav from "../inc/MemberSideNav";
import MemberTopNav from "../inc/MemberTopNav";
import Footer from "../inc/Footer";
import Dashboard from "../Member/Dashboard";
import { useNavigate } from "react-router-dom";
import AxiosConfig from "../axiosConfig";

function MemberLayout(props) {
    const navigate = useNavigate();
    useEffect(() => {
        if (props.path == "dashboard") {
            AxiosConfig.get("member/dashboard")
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
        } else if (props.path == "") {
            return "";
        }
    };
    return (
        <div className="main-wrapper">
            <MemberSideNav />

            <div className="page-wrapper">
                <MemberTopNav />

                <div className="page-content">{component()}</div>
                <Footer />
            </div>
        </div>
    );
}

export default MemberLayout;
