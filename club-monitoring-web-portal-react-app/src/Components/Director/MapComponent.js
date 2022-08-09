import React from 'react'
import AxiosConfig from "../axiosConfig";

const MapComponent = (props) => {
    const handleClickDelete = (event, { id }) => {
        //Write your code here
        var url = "component/delete/" + id;
        console.log(url);
        AxiosConfig.get(url)
            .then(resp => {
                console.log(resp.data);
                if(resp.data === 'success') {
                    window.location.reload(false);
                }
                else{
                    alert(resp.data);
                }
            }).catch(err => {
                console.log(err);
            });
    };
    return (
        <tr>
            <td>{props.id}</td>
            <td>{props.name}</td>
            <td>{props.description}</td>
            <td>{props.added_by}</td>
            <td><a onClick={event => handleClickDelete(event, { id: props.id })} className="btn btn-danger me-1 mb-1">Delete</a></td>
        </tr>
    )
}

export default MapComponent
