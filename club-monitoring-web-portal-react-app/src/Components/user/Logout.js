import React from 'react'
import axios from "axios"
import { useNavigate  } from "react-router-dom"


const Logout = () => {
    const navigate  = useNavigate();
    let user = JSON.parse(localStorage.getItem('user'));

    var obj = {token: user.token};
    axios.post("http://127.0.0.1:8000/api/logout",obj)
    .then(resp=>{
        var data = resp.data;
        console.log(data);
        localStorage.removeItem("user");
        navigate('/signin');
    }).catch(err=>{
        console.log(err);
    });
}

export default Logout
