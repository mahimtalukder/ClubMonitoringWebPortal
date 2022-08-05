import { React, useEffect, useState } from 'react'
import { useNavigate } from "react-router-dom"
import AxiosConfig from '../axiosConfig'



const Dashboard = () => {
    const navigate = useNavigate();
    useEffect(() => {
        AxiosConfig.get("director/dashboard")
            .then(resp => {
                console.log(resp.data);
            }).catch(err => {
                navigate("/signin");
                console.log(err);
            });

    }, []);

    return (
        <div>
            <div className="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 className="mb-3 mb-md-0">Welcome to Dashboard</h4>
                </div>
            </div>

        </div>
    )
}

export default Dashboard
