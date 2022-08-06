import React, { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { useFormik } from "formik";
import { Formik, Form, Field } from "formik";
import { useNavigate } from "react-router-dom";
import EditValidation from "./EditValidation";
const MemberEdit = (props) => {
    // const navigate = useNavigate();
    // const [dberror, setDberror] = useState("");
    let user = JSON.parse(localStorage.getItem("user"));
    console.log(localStorage.getItem("user"));
    // const [name, setName] = useState(user.name);
    // const [email, setEmail] = useState(user.email);
    // const [phone, setPhone] = useState(user.phone);
    // const [dob, setDob] = useState(user.dob);
    // const [address, setAddress] = useState(user.address);
    // const handleinputchange = (el) => {
    //     if (el.target.name == "name") {
    //         setName(el.target.value);
    //     } else if (el.target.name == "email") {
    //         setEmail(el.target.value);
    //     } else if (el.target.name == "phone") {
    //         setPhone(el.target.value);
    //     } else if (el.target.name == "dob") {
    //         setDob(el.target.value);
    //     } else if (el.target.name == "address") {
    //         setAddress(el.target.value);
    //     }
    // };
    const FormEdit = () => {
        var obj = { id: values.id };
        axios
            .get("http://127.0.0.1:8000/api/director/dashboard", obj)
            .then((resp) => {
                var data = resp.data;
                localStorage.setItem("user", JSON.stringify(data));
            })
            .catch((err) => {
                console.log(err);
            });
    };
    const { handleChange, values, errors, submitErrors, handleSubmit } =
        EditValidation(FormEdit);
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
                                                to="/member/profile"
                                            >
                                                About
                                            </Link>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active">
                                                Edit Profile
                                            </a>
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

                                        <form
                                            // onSubmit={handleSubmit}
                                            method="post"
                                            action="#"
                                            novalidate="novalidate"
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
                                                    // value={user.name}
                                                    onChange={handleChange}
                                                />
                                                {errors.name && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.name}
                                                    </span>
                                                )}
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
                                                    value={user.email}
                                                    onChange={handleChange}
                                                    // onBlur={handleBlur}
                                                />
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
                                                    // value={user.phone}
                                                    onChange={handleChange}
                                                />
                                                {errors.phone && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.phone}
                                                    </span>
                                                )}
                                            </div>
                                            {/* <div class="mb-3">
                                                                                <label class="form-label">Gender</label>
                                                                                <div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="male" id="gender1" {{ user.gender == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="female" id="gender2" {{ user.gender == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="Other" id="gender3" { user.gender == 'Other' ? 'checked' : '' }>
                                                <label class="form-check-label" for="gender3">
                                                    Other
                                                </label>
                                            </div>
                                                                                </div>
                                                                            </div> */}
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
                                                        value={user.dob}
                                                        onChange={handleChange}
                                                    />
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
                                            {/* <div class="mb-3">
                                                                                <label class="form-label">Blood Group</label>
                                                                                <select class="js-example-basic-single form-select select2-hidden-accessible" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option name="blood_group" value="" data-select2-id="1">Select blood group</option>
                                            <option name="blood_group" value="a-pos" data-select2-id="3" { user.blood_group == 'a-pos' ? 'selected' : '' }>A+</option>
                                            <option name="blood_group" value="a-neg" data-select2-id="13" { user.blood_group == 'a-neg' ? 'selected' : '' }>A-</option>
                                            <option name="blood_group" value="ab-pos" data-select2-id="14" { user.blood_group == 'ab-pos' ? 'selected' : '' }>AB+</option>
                                            <option name="blood_group" value="ab-neg" data-select2-id="15" { user.blood_group == 'ab-neg' ? 'selected' : '' }>AB-</option>
                                            <option name="blood_group" value="o-pos" data-select2-id="17" {user.blood_group == 'o-pos' ? 'selected' : ''}>O+</option>
                                            <option name="blood_group" value="o-neg" data-select2-id="18" { user.blood_group == 'o-neg' ? 'selected' : '' }>O-</option>
                                            <option name="blood_group" value="b-pos" data-select2-id="19" { user.blood_group == 'b-pos' ? 'selected' : '' }>B+</option>
                                            <option name="blood_group" value="b-neg" data-select2-id="11" { user.blood_group == 'b-neg' ? 'selected' : '' }>B-</option>
                                                                                </select>
                                                                            </div> */}
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
                                                    onChange={handleChange}
                                                    value={user.address}
                                                />
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
                                            <input
                                                class="btn btn-primary"
                                                type="submit"
                                                value="Submit"
                                            />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 stretch-card">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default MemberEdit;
