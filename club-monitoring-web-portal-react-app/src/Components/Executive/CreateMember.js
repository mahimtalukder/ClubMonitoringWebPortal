import React, { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import EditValidation from "./EditValidation";
const CreateMember = (props) => {
    const [dberror, setDberror] = useState("");
    let user = JSON.parse(localStorage.getItem("user"));
    console.log(localStorage.getItem("user"));
    const FormEdit = () => {
        var obj = {
            name: values.name,
            designation: values.designation,
            email: values.email,
            phone: values.phone,
            dob: values.dob,
            address: values.address,
        };
        axios
            .post("http://127.0.0.1:8000/api/executive/CreateMamber", obj)
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
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">
                                    Create Member's Account
                                </h6>
                                {dberror ? (
                                    <h5 className="text-danger">{dberror}</h5>
                                ) : (
                                    submitErrors.error && (
                                        <h5 className="text-danger">
                                            {submitErrors.error}
                                        </h5>
                                    )
                                )}

                                <form onSubmit={handleSubmit} method="post">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Name
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter full name"
                                                    name="name"
                                                    onChange={handleChange}
                                                />
                                                {errors.name && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.name}
                                                    </span>
                                                )}
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Designation
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter Designation"
                                                    name="designation"
                                                    onChange={handleChange}
                                                />
                                                {errors.designation && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.designation}
                                                    </span>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Email
                                                </label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    placeholder="Enter email address"
                                                    name="email"
                                                    onChange={handleChange}
                                                />
                                                {errors.email && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.email}
                                                    </span>
                                                )}
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Phone
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter phone number"
                                                    name="phone"
                                                    onChange={handleChange}
                                                />
                                                {errors.phone && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.phone}
                                                    </span>
                                                )}
                                            </div>
                                        </div>
                                        {/* <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <select class="form-select" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1"  >
                                        <option name="blood_group" value="" data-select2-id="1">Select blood group</option>
                                        <option name="blood_group" value="a-pos" data-select2-id="3" >A+</option>
                                        <option name="blood_group" value="a-neg" data-select2-id="13" >A-</option>
                                        <option name="blood_group" value="ab-pos" data-select2-id="14" >AB+</option>
                                        <option name="blood_group" value="ab-neg" data-select2-id="15" >AB-</option>
                                        <option name="blood_group" value="b-pos" data-select2-id="17" >B+</option>
                                        <option name="blood_group" value="b-neg" data-select2-id="14">B-</option>
                                        <option name="blood_group" value="o-pos" data-select2-id="12" >O+</option>
                                        <option name="blood_group" value="o-neg" data-select2-id="11" > O-</option>
                                    </select>
                                </div>
                            </div> */}

                                        {/* <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="male" id="gender1" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="female" id="gender2" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="Other" id="gender3" {{ old('gender') == 'Other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender3">
                                                Other
                                            </label>
                                        </div>

                                    </div>

                                </div>
                            </div> */}
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
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
                                                        class=""
                                                        onChange={handleChange}
                                                    />
                                                    {errors.dob && (
                                                        <span className="font-weight-light text-danger">
                                                            {errors.dob}
                                                        </span>
                                                    )}
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
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Address
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Enter Address"
                                                    name="address"
                                                    onChange={handleChange}
                                                />
                                                {errors.address && (
                                                    <span className="font-weight-light text-danger">
                                                        {errors.address}
                                                    </span>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-primary submit"
                                    >
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default CreateMember;
