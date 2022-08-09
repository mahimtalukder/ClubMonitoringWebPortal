import { React, useEffect } from "react";
import ExecutiveSideNav from "../inc/ExecutiveSideNav";
import ExecutiveTopNav from "../inc/ExecutiveTopNav";
import Footer from "../inc/Footer";
import Dashboard from "../Executive/Dashboard";
import { useNavigate } from "react-router-dom";
import AxiosConfig from "../axiosConfig";
import ExecutiveProfile from "../Executive/ExecutiveProfile";
import CreateMember from "../Executive/CreateMember";
import EditExecutive from "../Executive/EditExecutive";
import MemberList from "../Executive/MemberList";
import ViewMember from "../Executive/ViewMember";
import PostNotice from "../Executive/PostNotice";

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
        } else if (props.path == "profile") {
            return <ExecutiveProfile />;
        } else if (props.path == "createMember") {
            return <CreateMember />;
        } else if (props.path == "editExecutive") {
            return <EditExecutive />;
        }else if (props.path == "memberList") {
            return <MemberList />;
        }else if (props.path == "viewMember") {
            return <ViewMember />;
        }else if (props.path == "Noitce") {
            return <PostNotice />;
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
