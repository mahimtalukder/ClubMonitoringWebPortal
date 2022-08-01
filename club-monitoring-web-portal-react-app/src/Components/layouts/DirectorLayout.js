import {React, useEffect} from 'react'
import DirectorSideNav from '../inc/DirectorSideNav'
import DirectorTopNav from '../inc/DirectorTopNav'
import Dashboard from '../Director/Dashboard'
import { useNavigate  } from "react-router-dom";
import AxiosConfig from '../axiosConfig';

function DirectorLayout(props) {
    const navigate  = useNavigate();
    useEffect(()=>{
        AxiosConfig.get("director/dashboard")
        .then(resp=>{
          console.log(resp.data);
         }).catch(err=>{
            navigate("/signin");
        console.log(err);
    });
    },[]);

    
    const component = () => {
        
        if (props.path == 'dashboard') {
            return <Dashboard />;
        } else if (props.path == '') {
            return "";
        }
    }
    return (
        <div className="main-wrapper">

            <DirectorSideNav />

            <div className="page-wrapper">

                <DirectorTopNav />

                <div className="page-content">
                    {component()}

                </div>
                <footer
                    className="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                    <p className="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="{{route('home')}}">CMWP</a>.</p>
                </footer>

            </div>
        </div>
    )
}

export default DirectorLayout