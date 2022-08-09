import React from 'react'

const ComponentList = (props) => {
    return (
        <tr>
            <td>{props.i + 1}</td>
            <td>{props.name}</td>
            <td>{props.start_time}</td>
            <td>{props.end_time}</td>
            <td>{props.quantity}</td>
        </tr>
    )
}

export default ComponentList
