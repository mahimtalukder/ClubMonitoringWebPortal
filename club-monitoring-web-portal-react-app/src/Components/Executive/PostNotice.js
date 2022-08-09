import React, { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import EditValidation from "./EditValidation";
const PostNotice = (props) => {
    const [dberror, setDberror] = useState("");
    let user = JSON.parse(localStorage.getItem("user"));
    const FormEdit = () => {
        var obj = {
            id: values.id,
            title: values.title,
            notice: values.notice,
        };
        console.log(values);
        axios
            .post("http://127.0.0.1:8000/api/executive/sendNoticepost", obj)
            .then((resp) => {
                var data = resp.data;
                localStorage.setItem("user", JSON.stringify(data));
            })
            .catch((err) => {
                setDberror("Database error!");
                console.log(err);
            });
    };
    const { handleChange, values, errors, submitErrors, handleSubmit } =
        EditValidation(FormEdit);
    return (
       <div>
         <div class="page-content mx-0 px-0 my-0 py-0">
        <div class="row profile-body">
            <div class="d-none d-md-block col-md-2 col-xl-2 left-wrapper">
            </div>
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            {dberror ? (<h5 className="text-danger">{dberror}</h5>) : (
                                    submitErrors.error && (
                                        <h5 className="text-danger">
                                            {submitErrors.error}
                                        </h5>
                                    )
                                )}
                                <form method="post" onSubmit={handleSubmit}>
                                    <h3 class="card-title">Send Notice</h3>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Title</label>
                                        <input id="name" class="form-control" name="title" placeholder="title" type="text" onChange={handleChange}/>
                                        {errors.title && (
                                        <span className="font-weight-light text-danger">
                                            {errors.title}
                                        </span>
                                        )}
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Notice</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="notice" placeholder="Full notice" aria-label="With textarea" onChange={handleChange}></textarea>
                                        {errors.notice && (
                                        <span className="font-weight-light text-danger">
                                            {errors.notice}
                                        </span>
                                        )}
                                        </div>
                                    </div>

                                    <div class="d-none d-md-block">
                                        <button class="btn btn-primary btn-icon-text" type="submit">
                                            Send Notice
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
export default PostNotice;
