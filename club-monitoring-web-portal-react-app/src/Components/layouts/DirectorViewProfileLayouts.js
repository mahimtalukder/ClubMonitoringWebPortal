import React, {useState, useEffect} from "react";
import axios from "axios";
import DirectorViewProfile from 'DirectorViewPrifile';
import AxiosConfig from '../axiosConfig';

import DirectorSideNav from '../inc/DirectorSideNav'
import DirectorTopNav from '../inc/DirectorTopNav'
import { useNavigate  } from "react-router-dom";

const DirectorPrifile = ()=>{
    const [director, setdirector] = useState([]);

    useEffect(()=>{
        AxiosConfig.get("director/profile")
            .then(resp=>{
                console.log(resp.data);
                setdirector(resp.data);
            }).catch(err=>{
            console.log(err);
        });
    },[]);

    return(
        <div className="main-wrapper">

            <DirectorSideNav />

            <div className="page-wrapper">

                <DirectorTopNav />

                <div className="page-content">
                    {DirectorPrifile()}
                    <DirectorViewPrifile/>

                </div>
                <footer
                    className="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                    <p className="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="{{route('home')}}">CMWP</a>.</p>
                </footer>

            </div>
        </div>
    )

}
export default AllClient;