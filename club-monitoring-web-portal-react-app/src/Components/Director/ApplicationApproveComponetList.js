import React from 'react'
import { Helmet } from "react-helmet";
const handleClick = (event, { component_id, application_id }) => {
    <Helmet>
        <script src="../../../public/assets_2/dist/attention.js" type="text/javascript" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </Helmet>
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
