import React from 'react'
import { confirmAlert } from 'react-confirm-alert' // Import
import 'react-confirm-alert/src/react-confirm-alert.css' // Import css
import AxiosConfig from "../axiosConfig"
import { useNavigate } from "react-router-dom";

const handleClick = (event, { component_id, application_id }) => {
    confirmAlert({
        title: 'Reject',
        message: 'Are you sure to do this?'+component_id,
        buttons: [
          {
            label: 'Yes',
            onClick: () => {
                // var url = "director/application/removeComponent/"+component_id+"/"+application_id+"/Reject";
                var url = "/director/application/removeComponent/1/22-10001-06/Reject";
                AxiosConfig.get(url)
                    .then((resp) => {
                        if(resp.data === "success"){
                            var nav = "/director/application/read/"+application_id;
                            console.log(nav);
                            useNavigate(nav);
                        }
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
          },
          {
            label: 'No',
            onClick: () => alert('Click No')
          }
        ]
      });
};

const ApplicationApproveComponetList = (props) => {
    return (
        <tr id={"row" + props.id}>
            <input type="hidden" name={"component[" + props.i + "][id]"} value={props.id}></input>
            <td>{props.name}</td>
            <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name={"component[" + props.i + "][approved_start_time]"} placeholder='hh:mm tm' /></td>
            <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name={"component[" + props.i + "][approved_end_time]"} placeholder='hh:mm tm' /></td>
            <td><input type='number' className='form-control' id='exampleInputMobile' placeholder='Quantity' name={"component[" + props.i + "][approved_quantity]"} /></td>
            <td><a className="btn btn-danger" onClick={event => handleClick(event, { component_id: props.id, application_id: props.application_id })}>Reject Component</a></td>
        </tr>

    )
}

export default ApplicationApproveComponetList
