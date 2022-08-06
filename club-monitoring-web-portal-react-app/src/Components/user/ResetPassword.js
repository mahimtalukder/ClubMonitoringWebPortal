import React, { useState } from 'react'
import axios from "axios"
import { Link, useParams } from "react-router-dom"
import ResetPasswordValidation from "./ResetPasswordValidation"

const ResetPassword = (props) => {
    let { id } = useParams();
    const [dberror, setDberror] = useState("");
    const [success, setSuccess] = useState("");


    const formReset = () => {
        //Write your code here
        var obj = { id: id, otp: values.otp, password: values.password, confirm_password:values.confirm_password };
        console.log(obj);
        axios.post("http://127.0.0.1:8000/api/resetPasswordSubmitted", obj)
            .then(resp => {
                var data = resp.data;
                if (data == "success") {
                    setDberror("");
                    document.getElementById("success").innerHTML= "Passwrod reset success";
                   
                } else {
                    console.log(data);
                    setDberror("Invalid Input!");
                }
            }).catch(err => {
                setDberror("Invalid Input!");
                console.log(err);
            });

    }

    //Custom hook call
    const { handleChange, values, errors, submitErrors, handleSubmit } = ResetPasswordValidation(formReset);

    
    return (
        <div class="row">
            <div class="col-md-4 pe-md-0">
                <div class="auth-side-wrapper">

                </div>
            </div>
            <div class="col-md-8 ps-md-0">
                <div class="auth-form-wrapper px-4 py-5">
                    <a href="{{route('home')}}" class="noble-ui-logo d-block mb-2">CM<span>WP</span></a>
                    <div class="alert alert-success" id="success" role="alert">
                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                        A 6 digit otp has been sent to your registered email!
                    </div>

                    {dberror ? <h5 className="text-danger">{dberror}</h5>
                        : submitErrors.error && <h5 className="text-danger">{submitErrors.error}</h5>}
                    

                    <form class="forms-sample" onSubmit={handleSubmit} method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">Enter Id</label>
                            <input type="text" class="form-control" id="id" name="id" onChange={handleChange} disabled placeholder="XX-XXXXX-XX" value={id} />
                            {errors.id && <span className="font-weight-light text-danger">{errors.id}</span>}
                        </div>

                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" onChange={handleChange} placeholder="otp" />
                            {errors.otp && <span className="font-weight-light text-danger">{errors.otp}</span>}
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" id="password" onChange={handleChange} name="password" placeholder="Password" />
                            {errors.password && <span className="font-weight-light text-danger">{errors.password}</span>}
                            {/* @error('password')
                            <span class="font-weight-light text-danger">{{ $message }}</span>
                            @enderror */}
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="confirm_password" onChange={handleChange} name="confirm_password" placeholder="Confirm password" />
                            {errors.confirm_password && <span className="font-weight-light text-danger">{errors.confirm_password}</span>}
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                Reset
                            </button>
                        </div>
                        <Link className='d-block mt-3 text-muted' to="/signin">Already a user? Sign In</Link>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default ResetPassword