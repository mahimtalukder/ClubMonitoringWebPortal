import React from 'react'



const ApplicationApproveComponetList = (props) => {
    const handleClick = (event, { component_id, application_id }) => {

        var userName = prompt('Please Enter your Name');
        this.setState({ userName: userName });

    };
    return (
        <div>
            <tr id={"row" + props.id}>
                <input type="hidden" name={"component[" + props.i + "][id]"} value={props.id}></input>
                <td>{props.name}</td>
                <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name={"component[" + props.i + "][approved_start_time]"} placeholder='hh:mm tm' /></td>
                <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name={"component[" + props.i + "][approved_end_time]"} placeholder='hh:mm tm' /></td>
                <td><input type='number' className='form-control' id='exampleInputMobile' placeholder='Quantity' name={"component[" + props.i + "][approved_quantity]"} /></td>
                {/* <td><a className="btn btn-danger" onClick={event => handleClick(event, { component_id: props.id, application_id: props.application_id })}>Reject Component</a></td> */}
                <td><a className="btn btn-danger" id='buttionTo'>Reject Component</a></td>
            </tr>

        </div>

    )
}

export default ApplicationApproveComponetList
