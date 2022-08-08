import React from 'react'
import { Link, useNavigate } from "react-router-dom";
import AxiosConfig from "../axiosConfig";

const MapDirectorList = (props) => {
    const navigate = useNavigate();
    const handleClickBlockUnblock = (event, { user_id,  status}) => {
        //Write your code here
        var url = "admin/update/status/director/" + user_id + "/" + status;
        console.log(url);
        AxiosConfig.get(url)
            .then(resp => {
                window.location.reload(false);
            }).catch(err => {
                console.log(err);
            });
    };
    return (
        <tr>
            <td>
                <img className="wd-30 ht-30 rounded-circle" src={props.images} />
            </td>
            <td>{props.name}</td>
            <td>{props.user_id}</td>
            <td>{props.email}</td>
            <td>{props.phone}</td>
            <td>{props.designation}</td>
            <td>
                <Link to={"/admin/update/director/"+props.user_id } className="btn btn-primary me-1 mb-1">View</Link>
                {props.status === 1 ? <a onClick={event => handleClickBlockUnblock(event, { user_id: props.user_id, status:0 })} className="btn btn-danger me-1 mb-1">Block</a>
                    : props.status === 0 && <a onClick={event => handleClickBlockUnblock(event, { user_id: props.user_id, status:1 })} className="btn btn-success me-1 mb-1">Unblock</a>}
            </td>
        </tr>
    )
}

export default MapDirectorList