import React from 'react'

const ApprorovedComponent = (props) => {
    return (
        <>
            {props.is_approved === "approved" &&
                <tr>
                    <td>{props.i + 1}</td>
                    <td>{props.name}</td>
                    <td>{props.start_time}</td>
                    <td>{props.end_time}</td>
                    <td>{props.quantity}</td>
                </tr>
            }
        </>
    )
}

export default ApprorovedComponent