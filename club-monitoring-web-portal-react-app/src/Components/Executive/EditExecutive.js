import React, { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import EditValidation from "./EditValidation";
import AxiosConfig from '../axiosConfig' 
import {useFormik} from 'formik';


const validateEmployee = empData => {
    const errors = {};
    
    if (!empData.name) {
        errors.name = 'Please Enter Name';
    } else if (empData.name.length > 20) {
        errors.name = 'Name cannot exceed 20 characters';
    }
    
    if (!empData.email) {
        errors.email = 'Please Enter Email';
    }

    if (empData.phone.length > 11) {
        errors.phone = 'phone cannot exceed 11 characters';
    }

    // if (!empData.dob) {
    //     errors.dob = 'Please Enter dob';
    // }

    // if (!empData.address) {
    //     errors.address = 'Please Enter address';
    // }
    
    return errors;
    };



const EditExecutive = () => {
    let user = JSON.parse(localStorage.getItem("user"));
    const [dberror, setDberror] = useState("");
    const [success, setSuccess] = useState("");
    // const [user, setMember] = useState([]);
    // const FormEdit = () => {
    //     var obj = {
    //         // id: values.id,
    //         // name: values.name,
    //         // designation: values.designation,
    //         // email: values.email,
    //         // phone: values.phone,
    //         // dob: values.dob,
    //         // address: values.address,
    // //     };
    // //     // console.log(values);
    // //     AxiosConfig
    // //         .post(
    // //             "executive/editProfileSubmitted",
    // //             obj
    // //         )
    // //         .then((resp) => {
    // //             //setMember(resp.data);
    // //         })
    //         .catch((err) => {
    //             console.log(err);
    //         });
    // };


    

    const formik=useFormik({
        initialValues:{
        name:user.name,
        email:user.email,
        phone:user.phone,
        dob :user.dob,
        address : user.address,

        },
        validate:validateEmployee,
        onSubmit:values=>{
        alert(JSON.stringify(values));
        values.user_id = user.user_id;
        AxiosConfig.post("executive/editProfileSubmitted", values)
            .then(resp => {
                if (resp.data === "success") {
                    setSuccess("Profile successfully done!");
                    setDberror("");
                }else{
                    setDberror("profile update filed");
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
            <div class="page-content mx-0 px-0 my-0 py-0">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="d-flex justify-content-center p-3 rounded-bottom">
                                <div class="d-flex align-items-center m-0 p-0">
                                    <ul
                                        class="nav nav-tabs"
                                        id="myTab"
                                        role="tablist"
                                    >
                                        <li class="nav-item">
                                            <Link
                                                class="nav-link"
                                                to="/executive/profile"
                                            >
                                                About
                                            </Link>
                                        </li>
                                        <li class="nav-item">
                                            <Link
                                                class="nav-link active"
                                                to="/executive/editExecutive"
                                            >
                                                Edit Profile
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row profile-body">
                    <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
                        <div class="card rounded">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="card-title mb-0">Overview</h6>
                                </div>
                                <p>{user.bio}</p>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Full Name:
                                    </label>
                                    <p class="text-muted">{user.name}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        ID:
                                    </label>
                                    <p class="text-muted">{user.user_id}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Email:
                                    </label>
                                    <p class="text-muted">{user.email}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Phone:
                                    </label>
                                    <p class="text-muted">{user.phone}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Date of Birth:
                                    </label>
                                    <p class="text-muted">{user.dob}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Blood Group:
                                    </label>
                                    <p class="text-muted">{user.blood_group}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 fw-bolder mb-0 text-uppercase">
                                        Address:
                                    </label>
                                    <p class="text-muted">{user.address}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xl-9 right-wrapper">
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title pb-3">
                                            Update personal information
                                        </h4>
                                        {success && <div className="alert alert-success" role="alert">
                                            <i data-feather="check" className="text-success icon-lg me-2"></i>
                                            {success}
                                        </div>}
                                        {dberror &&  <span className="text-danger">{dberror}</span>}

                                        <form
                                            onSubmit={formik.handleSubmit}
                                            method="post"
                                        >
                                            <div class="mb-3">
                                                <label
                                                    htmlFor="name"
                                                    for="name"
                                                    class="form-label"
                                                >
                                                    Name
                                                </label>
                                                <input
                                                    id="name"
                                                    class="form-control"
                                                    name="name"
                                                    type="text"
                                                    value={formik.values.name}
                                                    onChange={formik.handleChange} onBlur={formik.handleBlur}></input>
                                               {formik.touched.name && formik.errors.name ? <span style={{color:'red'}}>{formik.errors.name}</span> : null}
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    for="email"
                                                    class="form-label"
                                                >
                                                    Email
                                                </label>
                                                <input
                                                    id="email"
                                                    class="form-control"
                                                    name="email"
                                                    type="email"
                                                    // onBlur={handleBlur}
                                                    value={formik.values.email}
                                                    onChange={formik.handleChange} onBlur={formik.handleBlur}></input>
                                               {formik.touched.email && formik.errors.email ? <span style={{color:'red'}}>{formik.errors.email}</span> : null}
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    for="phone"
                                                    class="form-label"
                                                >
                                                    Phone
                                                </label>
                                                <input
                                                    id="phone"
                                                    class="form-control"
                                                    name="phone"
                                                    type="text"
                                                    value={formik.values.phone}
                                                    onChange={formik.handleChange} onBlur={formik.handleBlur}></input>
                                               {formik.touched.phone && formik.errors.phone ? <span style={{color:'red'}}>{formik.errors.phone}</span> : null}
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Date of Birth
                                                </label>
                                                <div class="input-group date datepicker mx-0 px-0">
                                                    <input
                                                        data-provide="datepicker"
                                                        data-date-format="dd/mm/yyyy"
                                                        type="text"
                                                        id="datepicker"
                                                        name="dob"
                                                        class="form-control"
                                                        value={formik.values.dob}
                                                        onChange={formik.handleChange} onBlur={formik.handleBlur}></input>
                                                        {formik.touched.dob && formik.errors.dob ? <span style={{color:'red'}}>{formik.errors.dob}</span> : null}
                                                </div>
                                                <div>
                                                    <span class="input-group-text input-group-addon">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="24"
                                                            height="24"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-calendar"
                                                        >
                                                            <rect
                                                                x="3"
                                                                y="4"
                                                                width="18"
                                                                height="18"
                                                                rx="2"
                                                                ry="2"
                                                            ></rect>
                                                            <line
                                                                x1="16"
                                                                y1="2"
                                                                x2="16"
                                                                y2="6"
                                                            ></line>
                                                            <line
                                                                x1="8"
                                                                y1="2"
                                                                x2="8"
                                                                y2="6"
                                                            ></line>
                                                            <line
                                                                x1="3"
                                                                y1="10"
                                                                x2="21"
                                                                y2="10"
                                                            ></line>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    for="name"
                                                    class="form-label"
                                                >
                                                    Address
                                                </label>
                                                <input
                                                    id="address"
                                                    class="form-control"
                                                    name="address"
                                                    type="text"
                                                    value={formik.values.address}
                                                    onChange={formik.handleChange} onBlur={formik.handleBlur}></input>
                                                    {formik.touched.address && formik.errors.address ? <span style={{color:'red'}}>{formik.errors.address}</span> : null}
                                                
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <label
                                                        class="form-check-label"
                                                        for="termsCheck"
                                                    >
                                                        Agree to{" "}
                                                        <a href="#">
                                                            {" "}
                                                            terms and conditions{" "}
                                                        </a>
                                                    </label>
                                                    <input
                                                        type="checkbox"
                                                        class="form-check-input"
                                                        name="terms_agree"
                                                        id="termsCheck"
                                                    />
                                                </div>
                                            </div>
                                            <button
                                            class="btn btn-primary"
                                                type="submit"
                                                >
                                                    submit
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            {/* <div class="col-md-12 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <form
                                            action="{{route('memberImageUploadsubmitted')}}"
                                            method="post"
                                            enctype="multipart/form-data"
                                        >
                                            <h6 class="card-title">
                                                Change Profile Picture
                                            </h6>
                                            <p class="text-muted mb-3">
                                                Image must be 100X100 px.
                                            </p>
                                            <div class="mb-3">
                                                <input
                                                    class="form-control"
                                                    type="file"
                                                    id="image"
                                                    name="image"
                                                />
                                            </div>
                                            <div class="d-none d-md-block">
                                                <button
                                                    class="btn btn-primary btn-icon-text"
                                                    type="submit"
                                                >
                                                    <svg
                                                        href=""
                                                        width="20"
                                                        height="20"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-upload-cloud"
                                                    >
                                                        <polyline points="16 16 12 12 8 16"></polyline>
                                                        <line
                                                            x1="12"
                                                            y1="12"
                                                            x2="12"
                                                            y2="21"
                                                        ></line>
                                                        <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                                                        <polyline points="16 16 12 12 8 16"></polyline>
                                                    </svg>
                                                    Upload
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div> */}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        //  </div>
    );
};
export default EditExecutive;
