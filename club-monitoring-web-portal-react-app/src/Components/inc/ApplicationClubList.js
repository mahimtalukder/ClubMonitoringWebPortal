import React from 'react'

const ApplicationClubList = (props) => {
    return (
        <div>
            <div className="email-list-item row">
                <a href="{{route('clubWiseApplication',['id' => $club->id])}}" className="email-list-detail">
                    <div className="col-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder text-muted icon-lg me-2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <div className="content col-10">
                        <strong className="from">{props.name}</strong>
                    </div>
                </a>
            </div>
        </div>
    )
}

export default ApplicationClubList
