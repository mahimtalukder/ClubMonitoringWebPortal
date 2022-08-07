import React from 'react'

const MapDirectorList = (props) => {
    return (
        <tr>
            <td>
                <td>{props.name}</td>
                <img className="wd-30 ht-30 rounded-circle" src={props.images} />
            </td>
            <td>{props.name}</td>
            <td>{props.user_id}</td>
            <td>{props.email}</td>
            <td>{props.phone}</td>
            <td>{props.designation}</td>
            <td>
                <a href="/admin/update/director/{{$director->user_id}}" className="btn btn-primary me-1 mb-1">Edit</a>
                {props.status === 1 ? <a href="/admin/update/status/director/{{$director->user_id}}/0" className="btn btn-danger me-1 mb-1">Block</a>
                    : props.status === 0 && <a href="/admin/update/status/director/{{$director->user_id}}/1" className="btn btn-success me-1 mb-1">Unblock</a>}
            </td>
        </tr>
    )
}

export default MapDirectorList