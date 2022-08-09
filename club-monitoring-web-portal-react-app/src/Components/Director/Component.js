import React, { useState, useEffect } from 'react'
import AxiosConfig from "../axiosConfig";
import { useNavigate } from "react-router-dom";
import MapComponent from './MapComponent'
import { useFormik } from 'formik';

const Component = () => {
    let user = JSON.parse(localStorage.getItem('user'));
    const [dberror, setDberror] = useState("");
    const [nameErr, setNameErr] = useState("");
    const [success, setSuccess] = useState("");
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [components, setComponents] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        AxiosConfig.get('component/list')
            .then((resp) => {
                setComponents(resp.data);
                setLoading(false);
            })
            .catch((err) => {
                setLoading(false);
                navigate("/signin");
                console.log(err);
            });
    };


    //Add components
    const validateComponent = data => {
        const errors = {};


        if (!data.name) {
            errors.name = 'Enter name';
            setNameErr('Enter name');
        } else {
            let url = "component/find/" + data.name;
            AxiosConfig.get(url)
                .then(resp => {
                    console.log(resp.data);
                    if (resp.data != 1) {
                        errors.name = 'Name is not unique';
                        setNameErr('Name is not unique');
                        console.log(errors);
                    } else {
                        setNameErr("");
                    }
                }).catch(err => {
                    console.log(err);
                });
        }

        if (!data.description) {
            errors.description = 'Description needed.';
        }

        return errors;
    };

    const formik = useFormik({
        initialValues: {
            name: '',
            description: '',
        },
        validate: validateComponent,
        onSubmit: values => {
            values.user_id = user.user_id;
            AxiosConfig.post("component/add", values)
                .then(resp => {
                    if (resp.data === "success") {
                        setSuccess("Component added successfully!");
                        setDberror("");
                        fetchData();
                    } else {
                        setDberror("Internal error!");
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
                <div className="row">
                    <div className="col-md-4 grid-margin">
                        <div className="card">
                            <div className="card-body">
                                <h6 className="card-title">Add Component</h6>
                                {success && <div className="alert alert-success" role="alert">
                                    {success}
                                </div>}
                                {dberror && <div className="alert alert-danger" role="alert">
                                    {dberror}
                                </div>}
                                <form className="forms-sample pt-3" onSubmit={formik.handleSubmit}>
                                    <div className="mb-3">
                                        <label for="exampleInputUsername1" className="form-label">Name</label>
                                        <input type="text" className="form-control" id="exampleInputUsername1" name="name" value={formik.values.name} onChange={formik.handleChange} onBlur={formik.handleBlur} placeholder="Component Name" />
                                        {nameErr && <span className="font-weight-light text-danger">{nameErr}</span>}
                                        {/* @error('name')
                            <span className="text-danger">{{$message}}</span>
                            @enderror */}
                                    </div>
                                    <div className="mb-3">
                                        <label for="exampleInputEmail1" className="form-label">Description</label>
                                        <input type="text" className="form-control" id="exampleInputEmail1" name="description" value={formik.values.description} onChange={formik.handleChange} onBlur={formik.handleBlur} placeholder="Component Description" />
                                        {formik.touched.name && formik.errors.name ? <span className="text-danger">{formik.errors.description}</span> : null}
                                        {/* @error('description')
                            <span className="text-danger">{{$message}}</span>
                            @enderror */}
                                    </div>
                                    <button type="submit" className="btn btn-primary me-2">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <>
                        {loading ? (
                            <div className="page-content mx-0 px-0 my-0 py-0">...Data Loading.....</div>
                        ) : (
                            <div className="col-md-8 grid-margin stretch-card">
                                <div className="card">
                                    <div className="card-body">
                                        <h6 className="card-title">All Components</h6>
                                        <div className="table-responsive">
                                            <table id="dataTableExample" className="table">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Added By</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {
                                                        components.map(component => (
                                                            <MapComponent
                                                                id={component.id}
                                                                name={component.name}
                                                                email={component.email}
                                                                description={component.description}
                                                                added_by={component.added_by}
                                                            ></MapComponent>
                                                        ))
                                                    }
                                                    {/* @foreach($components as $component)
                                                    <tr>
                                                        <td>{{ $component-> id}}</td>
                                                        <td>{{ $component-> name}}</td>
                                                        <td>{{ $component-> description}}</td>
                                                        <td>{{ $component-> added_by}}</td>
                                                        <td></td>
                                                    </tr>
                                                    @endforeach */}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        )}
                    </>
                </div>
            </div>
        </div>

    )
}

export default Component
