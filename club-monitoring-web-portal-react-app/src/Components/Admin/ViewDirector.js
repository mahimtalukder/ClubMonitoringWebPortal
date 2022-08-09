import React,{useState,useEffect } from 'react'
import AxiosConfig from "../axiosConfig";
import { useParams, useNavigate } from "react-router-dom";

const ViewDirector = () => {
    let { directorID } = useParams();
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [director, setDirector] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        var url = "admin/director/" + directorID;
        console.log(url);
        AxiosConfig.get(url)
            .then((resp) => {
                setDirector(resp.data);
                setLoading(false);
            })
            .catch((err) => {
                setLoading(false);
                navigate("/signin");
                console.log(err);
            });
    };

    return (
        <>
            {loading ? (
                <div>...Data Loading.....</div>
            ) : (
                <div>
                    <div className="page-content mx-0 px-0 my-0 py-0">
                        <div className="row">
                            <div className="col-md-12 stretch-card">
                                <div className="card">
                                    <div className="card-body">
                                        <h6 className="card-title">Director's Account</h6>

                                        <form >
                                            <div className="row">
                                                <div className="col-sm-6">
                                                    <div className="mb-3">
                                                        <label className="form-label">Name *</label>
                                                        <input type="text" className="form-control" placeholder="Enter full name" name="name" value={director.name} />
                
                                                    </div>
                                                </div>
                                                <div className="col-sm-6">
                                                    <div className="mb-3">
                                                        <label className="form-label">Designation</label>
                                                        <input type="text" className="form-control" placeholder="Enter Designation" name="designation" value={director.designation} />
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-sm-12">
                                                    <div className="mb-3">
                                                        <label className="form-label">Email *:</label>
                                                        <input type="email" className="form-control" placeholder="Enter email address" name="email" value={director.email} />

                                                    </div>
                                                </div>
                                                <div className="col-sm-4">
                                                    <div className="mb-3">
                                                        <label className="form-label">Phone *</label>
                                                        <input type="text" className="form-control" placeholder="Enter phone number" name="phone" value={director.phone} />
                                                    </div>
                                                </div>

                                            </div>
                                            <div className="row">
                                                <div className="col-sm-6">

                                                    <div className="mb-3">
                                                        <label className="form-label">Date of Birth</label>
                                                        <div className="input-group date datepicker mx-0 px-0">
                                                            <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" name="dob" className="form-control"  value={director.dob} />
                                                            <span className="input-group-text input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" className="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                                        </div>
                                                        {/* @error('dob')
                                            <span className="text-danger">{{$message}}</span>
                                            @enderror */}
                                                    </div>

                                                </div>
                                                <div className="col-sm-6">
                                                    <div className="mb-3">
                                                        <label className="form-label">Address</label>
                                                        <input type="text" className="form-control" placeholder="Enter Address" name="address"  value={director.address} />
                                                        {/* @error('address')
                                            <span className="text-danger">{{$message}}</span>
                                            @enderror */}
                                                    </div>
                                                </div>
                                            </div>
                                            {/* <button type="submit" className="btn btn-primary submit">Submit</button> */}
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </>
    )
}

export default ViewDirector
