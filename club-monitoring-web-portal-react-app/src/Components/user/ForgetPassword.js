import React, { useState } from 'react'
import { Link, useNavigate } from "react-router-dom"
import axios from "axios"
import ForgetPasswordValidation from './ForgetPasswordValidation'


const ForgetPassword = () => {
    const navigate  = useNavigate();
    const [submitErrorHook, setSubmitErrorsHook] = useState("")
    const formReset = () => {
        
        //Write your code here
        var obj = {id: values.id};
        axios.post("http://127.0.0.1:8000/api/signinSubmitted",obj)
        .then(resp=>{
            var data = resp.data;
            localStorage.setItem('user',JSON.stringify(data));
            let user = JSON.parse(localStorage.getItem('user'));
            if(user.user_type=="director"){
                setSubmitErrorsHook("");
                navigate('/director/dashboard');
            }else{
                setSubmitErrorsHook("Invalide input");
            }
        }).catch(err=>{
            setSubmitErrorsHook("Invalide input");
            console.log(err);
        });

    }

    //Custom hook call
    const { handleChange, values, errors, submitErrors, handleSubmit } = ForgetPasswordValidation(formReset);
  return (
<div class="row">
        <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper">

            </div>
        </div>
        <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
                <a href="#" class="noble-ui-logo d-block mb-2">CM<span>WP</span></a>
                {/* @if (!empty($message))
                    <div class="alert alert-success" role="alert">
                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                        {{$message}}
                    </div>
                    <h6 class="card-title text-primary"></h6>
                @endif
                @if (!empty($error_message))
                    <h5 class="text-danger">{{$error_message}}</h5>
                @endif */}
                {submitErrors.error && <h5 className="text-danger" id="submitErrors">{submitErrors.error}{submitErrorHook}</h5>}
                <form class="forms-sample" onSubmit={handleSubmit}  method="post">
                    <div class="mb-3">
                        <label for="id" class="form-label">Enter Id</label>
                        <input type="text" class="form-control" id="id" name="id" onChange={handleChange} placeholder="XX-XXXXX-XX"/>
                        {errors.id && <span className="font-weight-light text-danger">{errors.id}</span>}
                        {/* @error('id')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror */}
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            Get Reset Code
                        </button>
                    </div>
                    <Link className='d-block mt-3 text-muted' to="/signin">Already a user? Sign In</Link>
                </form>
            </div>
        </div>
    </div>
  )
}

export default ForgetPassword
