import React from 'react'

const ApplicationList = (props) => {
    const date = new Date();
    return (
        <div className="email-list-item">
            <div className="email-list-actions">
                {props.is_approved == "approved" &&
                    <i data-feather="check" className="text-success icon-lg me-2"></i>
                }
                {props.is_approved == "pending" &&
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock icon-lg me-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                }
                {props.is_approved == "rejected" &&
                    <i data-feather="x" className="text-danger icon-lg me-2"></i>
                }
            </div>
            <a href="{{route('directorApplicationRead',['id' => $application->application_id])}}" className="email-list-detail">
                <div className="content">
                    <span className="from">{props.subject}</span>
                    <p className="msg">{props.description}</p>
                </div>
                <span className="date">{new Date(props.created_at).toDateString()}</span>
            </a>
        </div>

    )
}

export default ApplicationList
