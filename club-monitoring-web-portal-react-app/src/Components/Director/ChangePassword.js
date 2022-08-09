import { React, useEffect, useState } from 'react'
import { useNavigate } from "react-router-dom"
import AxiosConfig from '../axiosConfig'
import { useFormik } from 'formik';

const ChangePassword = () => {
    let user = JSON.parse(localStorage.getItem('user'));
    const [dberror, setDberror] = useState("");
    const [success, setSuccess] = useState("");
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

    const validatePasswords = data => {
        const errors = {};

        if (!data.current_password) {
            errors.current_password = 'Enter your current password';
        }

        if (!data.new_password) {
            errors.new_password = 'Enter new password';
        } else if (data.new_password.length < 8) {
            errors.new_password = 'Password has to be least 8 characters';
        }

        if (data.confirm_password !== data.new_password) {
            errors.confirm_password = 'Password are not matched';
        }

        return errors;
    };

    const formik = useFormik({
        initialValues: {
            current_password: '',
            new_password: '',
            confirm_password: ''
        },
        validate: validatePasswords,
        onSubmit: values => {
            values.user_id = user.user_id;
            AxiosConfig.post("director/changePasswordSubmitted", values)
                .then(resp => {
                    if (resp.data === "success") {
                        setSuccess("Password reset successfully done!");
                        setDberror("");
                    }else{
                        setDberror("Password not matched");
                        setSuccess("");
                    }
                }).catch(err => {
                    setDberror("Internal error!");
                    setSuccess("");
                    console.log(err);
                });
        }
    });
    return (
        <div>
            <div className="page-content mx-0 px-0 my-0 py-0">

                <div className="row profile-body">
                    <div className="d-none d-md-block col-md-2 col-xl-2 left-wrapper">
                    </div>
                    <div className="col-md-8 col-xl-8 middle-wrapper">
                        <div className="row">
                            <div className="col-lg-12 grid-margin stretch-card">
                                <div className="card">
                                    <div className="card-body">
                                        <h4 className="card-title pb-3">Change Password</h4>
                                        {success && <div className="alert alert-success" role="alert">
                                            <i data-feather="check" className="text-success icon-lg me-2"></i>
                                            {success}
                                        </div>}
                                        {dberror &&  <span className="text-danger">{dberror}</span>}

                                        <form onSubmit={formik.handleSubmit}>


                                            <div className="mb-3">
                                                <label for="current_password" className="form-label">Currernt Password</label>
                                                <input id="current_password" className="form-control"
                                                    name="current_password" type="password" value={formik.values.current_password} onChange={formik.handleChange} onBlur={formik.handleBlur} placeholder="Current Password" />
                                                {formik.touched.current_password && formik.errors.current_password ? <span className="text-danger">{formik.errors.current_password}</span> : null}

                                                {/* @error('current_password')
                                    <span className="text-danger">{{ $message }}</span>
                                @enderror */}

                                            </div>

                                            <div className="mb-3">
                                                <label for="new_password" className="form-label">New Password</label>
                                                <input id="new_password"
                                                    className="form-control"
                                                    name="new_password" type="password" value={formik.values.new_password} onChange={formik.handleChange} onBlur={formik.handleBlur} placeholder="New Password" />
                                                {formik.touched.new_password && formik.errors.new_password ? <span className="text-danger">{formik.errors.new_password}</span> : null}

                                                {/* @error('new_password')
                                    <span className="text-danger">{{ $message }}</span>
                                @enderror */}

                                            </div>

                                            <div className="mb-3">
                                                <label for="confirm_password" className="form-label">Confirm Password</label>
                                                <input id="confirm_password"
                                                    className="form-control"
                                                    name="confirm_password" type="password" value={formik.values.confirm_password} onChange={formik.handleChange} onBlur={formik.handleBlur} placeholder="Confirm Password" />
                                                {formik.touched.confirm_password && formik.errors.confirm_password ? <span className="text-danger">{formik.errors.confirm_password}</span> : null}

                                                {/* @error('confirm_password')
                                    <span className="text-danger">{{ $message }}</span>
                                @enderror */}

                                            </div>
                                            <button className="btn btn-primary" type="submit"> Change </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    )
}

export default ChangePassword
