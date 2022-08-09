import { forEach } from 'lodash';
import React from 'react'
import { Link, useNavigate } from "react-router-dom";
import AxiosConfig from "../axiosConfig";

const MapViewNotice = (props) => {
    const navigate = useNavigate();
    const date = new Date();
    return (
        <div>
    <div class="email-list-item email-list-item--unread">
        <div class="email-list-actions">
        <a class="favorite" href="javascript:;"><span><i
        data-feather="star"></i></span></a>
    </div>
    <a class="email-list-detail">
        <div class="content">
            <span class="from" data-bs-toggle="modal"
                data-bs-target="#exampleModalLongScollable">{props.title }</span>
            <p class="msg">{ props.notice }</p>
        </div>
        <span class="date">
        {new Date(props.created_at).toDateString()}
        </span>
    </a>
    </div>
        </div>

    )
}

export default MapViewNotice