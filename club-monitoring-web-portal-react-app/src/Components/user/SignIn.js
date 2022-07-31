import React from 'react';
import { Link } from "react-router-dom";
import SignInValidation from './SignInValidation';
import {useState}  from 'react';
import axios from 'axios';
const SignIn = () => {
      //Final submit function
    let[token, setToken]= useState("");
    let[user_id, setUser_id] = useState("");
    let[password, setPassword] =useState("");
  




  const formLogin = () => {
      //Write your code here
    console.log("Callback function when form is submitted!");
    console.log("Form Values ", values);




    var obj = {
        "user_id": "user_id",
        "password": "password"
    };
    var obj = {user_id: user_id, password: password};
    axios.post("/signinSubmitted",obj)
    .then(resp=>{
        console.log(resp.data);
        var token = resp.data;
        console.log(token);
        var user = {user_id: token.user_id, access_token:token.token};
        localStorage.setItem('user',JSON.stringify(user));
         console.log(localStorage.getItem('user'));
    }).catch(err=>{
        console.log(err);
    });
  }

  //Custom hook call
  const {handleChange, values,errors, submitErrors, handleSubmit} = SignInValidation(formLogin);
    return (
        
        <div className="row">
            <div className="col-md-4 pe-md-0">
                <div className="auth-side-wrapper">
                </div>
            </div>
            <div className="col-md-8 ps-md-0">
                <div className="auth-form-wrapper px-4 py-5">
                    <a href="#" className="noble-ui-logo d-block mb-2">CM<span>WP</span></a>
                    <h5 className="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    {/* @if (!empty($message))
                    <div className="alert alert-success" role="alert">
                        <i data-feather="check" className="text-success icon-lg me-2"></i>
                        {{ $message }}
                    </div>
                    <h6 className="card-title text-primary"></h6>
                    @endif 
                    */}
                    {submitErrors.error && <h5 className="text-danger">{submitErrors.error}</h5>}
                    
                    <form className="forms-sample" onSubmit={handleSubmit}>
                        {/* {{ csrf_field() }} */}
                        <div className="mb-3">
                            <label for="id" className="form-label">ID</label>
                            <input type="text" className="form-control" id="id" name="id" onChange={handleChange} placeholder="XX-XXXXX-XX"/>
                            {errors.id && <span className="font-weight-light text-danger">{errors.id}</span>}
                        </div>
                        <div className="mb-3">
                            <label for="password" className="form-label">Password</label>
                            <input type="password" className="form-control" id="password" name="password" onChange={handleChange} placeholder="Password"/>
                            {errors.password && <span className="font-weight-light text-danger">{errors.password}</span>}
                                
                        </div>
                        <div className="form-check mb-3">
                            <input type="checkbox" className="form-check-input" id="authCheck"/>
                                <label className="form-check-label" for="authCheck">
                                    Remember me
                                </label> 
                        </div>
                        <div>
                            <button type="submit" className="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                Login
                            </button>
                        </div>
                        <Link className='d-block mt-3 text-muted' to="/forgetPassword">Forget password? Reset Password</Link>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default SignIn