import React from 'react'
import { Link } from "react-router-dom";

const ApplicationList = (props) => {
    console.log(props);
    const date = new Date();
    return (
        <div className="email-list-item">
            <div className="email-list-actions">
                {props.is_approved == "approved" &&
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check text-success icon-lg me-2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                }
                {props.is_approved == "pending" &&
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                }
                {props.is_approved == "rejected" &&
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x text-danger icon-lg me-2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                }
            </div>
            <Link to={"/director/application/read/"+props.application_id} className="email-list-detail">
                <div className="content">
                    <span className="from">{props.subject}</span>
                    <p className="msg">{props.description}</p>
                </div>
                <span className="date">{new Date(props.created_at).toDateString()}</span>
            </Link>
        </div>

    )
}

export default ApplicationList
