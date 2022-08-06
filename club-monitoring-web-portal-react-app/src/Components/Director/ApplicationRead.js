import React, { useState, useEffect } from "react";
import AxiosConfig from "../axiosConfig";
import { Link, useParams, useNavigate } from "react-router-dom";
import DirectorApplicationSideNav from "../inc/DirectorApplicationSideNav";
import { Form } from "react-bootstrap";
import ApplicationApproveComponetList from "./ApplicationApproveComponetList";

const ApplicationRead = () => {
    let { applicationID } = useParams();
    console.log(applicationID);
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [club, setClub] = useState([]);
    const [requested_components, setRequested_components] = useState([]);
    const [application, setApplication] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        var url = "director/application/read/" + applicationID;
        AxiosConfig.get(url)
            .then((resp) => {
                setApplication(resp.data.application);
                setClub(resp.data.club);
                setRequested_components(resp.data.requested_components);
                setLoading(false);
            })
            .catch((err) => {
                setLoading(false);
                //navigate("/signin");
                console.log(err);
            });
    };

    return (
        <>
            {loading ? (
                <div>...Data Loading.....</div>
            ) : (
                <div className="row inbox-wrapper">
                    <div className="col-lg-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="row">
                                    <DirectorApplicationSideNav />
                                    <div className="col-lg-9">
                                        <div className="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                                            <div className="d-flex align-items-center">
                                                {application["is_approved"] ===
                                                    "approved" && (
                                                    <i
                                                        data-feather="check"
                                                        className="text-success icon-lg me-2"
                                                    ></i>
                                                )}

                                                {application["is_approved"] ===
                                                    "rejected" && (
                                                    <i
                                                        data-feather="x"
                                                        className="text-danger icon-lg me-2"
                                                    ></i>
                                                )}

                                                {application["is_approved"] ===
                                                    "pending" && (
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
                                                        class="feather feather-clock text-muted icon-lg me-2"
                                                    >
                                                        <circle
                                                            cx="12"
                                                            cy="12"
                                                            r="10"
                                                        ></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg>
                                                )}

                                                {
                                                    <span>
                                                        {application.subject}
                                                    </span>
                                                }
                                            </div>
                                            <div>
                                                <a href="#">
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
                                                        class="feather feather-printer text-muted icon-lg me-2"
                                                        data-bs-toggle="tooltip"
                                                        title=""
                                                        data-bs-original-title="Print"
                                                        aria-label="Print"
                                                        aria-describedby="tooltip125286"
                                                    >
                                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                                                        <rect
                                                            x="6"
                                                            y="14"
                                                            width="12"
                                                            height="8"
                                                        ></rect>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        {/* @if ($errors->any())
                                    <div className="alert alert-danger">
                                        <ul>
                                            <li>All fields are required</li>
                                        </ul>
                                    </div>
                                    @endif */}
                                        <div className="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                            <div className="d-flex align-items-center">
                                                <div className="d-flex align-items-center">
                                                    <a
                                                        href="#"
                                                        className="text-muted"
                                                    >
                                                        {club.name}
                                                    </a>
                                                    <span className="mx-2 text-muted">
                                                        to
                                                    </span>
                                                    <a
                                                        href="#"
                                                        className="text-body me-2"
                                                    >
                                                        {application.sent_to}
                                                    </a>
                                                </div>
                                            </div>
                                            <div className="tx-13 text-muted mt-2 mt-sm-0">
                                                {new Date(
                                                    application.created_at
                                                ).toDateString()}
                                            </div>
                                        </div>
                                        <div className="p-4">
                                            {application.description}
                                        </div>
                                        <div className="p-4 border-bottom">
                                            <div className="mb-3">
                                                Requested Date:{" "}
                                                {application.request_date}
                                            </div>
                                            {requested_components.length !=
                                                0 && (
                                                <div>
                                                    <div className="mb-3">
                                                        Requested Components
                                                    </div>
                                                    <div className="col-md-12 border-2">
                                                        <div className="mb-3">
                                                            <table className="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            #
                                                                        </th>
                                                                        <th>
                                                                            Name
                                                                        </th>
                                                                        <th>
                                                                            Start
                                                                            Time
                                                                        </th>
                                                                        <th>
                                                                            End
                                                                            Time
                                                                        </th>
                                                                        <th>
                                                                            Quantity
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {/* @php
                                                                $count=0;
                                                                @endphp
                                                                @foreach($requested_components as $component)
                                                                <tr>
    
                                                                    <td>{{ $count+ 1}}</td>
                                                                    <td>{{ $component-> name}}</td>
                                                                    <td>{{ $component-> start_time}}</td>
                                                                    <td>{{ $component-> end_time}}</td>
                                                                    <td>{{ $component-> quantity}}</td>
                                                                    @php
                                                                    $count = $count+1;
                                                                    @endphp
                                                                </tr>
                                                                @endforeach */}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            )}
                                        </div>
                                        {application.is_approved ==
                                            "approved" && (
                                            <div className="p-3 bg-body">
                                                <div className="mb-3">
                                                    Approved Date:{" "}
                                                    {application.approve_date}
                                                </div>
                                                <div>Approved Components</div>
                                                <div className="col-md-12 border-2 mt-3">
                                                    <div className="mb-3 table-responsive">
                                                        <table className="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>
                                                                        Name
                                                                    </th>
                                                                    <th>
                                                                        Start
                                                                        Time
                                                                    </th>
                                                                    <th>
                                                                        End Time
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                {/* @php
                                                        $count=0;
                                                        @endphp
                                                        @foreach($requested_components as $component)
                                                        <tr>
                                                                @if($component->is_approved=="approved")
                                                            <td>{{ $count+ 1}}</td>
                                                            <td>{{ $component-> name}}</td>
                                                            <td>{{ $component-> approved_start_time}}</td>
                                                            <td>{{ $component-> approved_end_time}}</td>
                                                            <td>{{ $component-> quantity}}</td>
                                                            @php
                                                            $count = $count+1;
                                                            @endphp
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                        @if($count == 0)
                                                        <tr><td>No Approved Components</td></tr>
                                                        @endif */}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        )}

                                        {application.is_approved ==
                                            "rejected" && (
                                            <div className="p-3 bg-warning">
                                                <div className="mb-3">
                                                    <strong>
                                                        Application Rejected
                                                    </strong>
                                                </div>
                                                <div>Directors Comment:</div>
                                                {application.rejection_msg}
                                            </div>
                                        )}

                                        {application.is_approved ==
                                            "pending" && (
                                            <form
                                                className="forms-sample"
                                                action="{{route('directorApplicationUpdateSubmitted')}}"
                                                method="post"
                                            >
                                                <div className="p-3 bg-body">
                                                    <div className="mb-3">
                                                        <strong>
                                                            Application Approval
                                                            Section
                                                        </strong>
                                                    </div>
                                                    <input
                                                        type="hidden"
                                                        name="application_id"
                                                        value={
                                                            application.application_id
                                                        }
                                                    />
                                                    <div className="date">
                                                        <div className="row mb-3">
                                                            <label className="col-md-2 col-form-label">
                                                                Approve Date
                                                            </label>
                                                            <div className="col-md-10">
                                                                <div className="col-md-10">
                                                                    <div className="input-group date datepicker">
                                                                        <Form.Control
                                                                            type="date"
                                                                            className="form-control"
                                                                            name="date"
                                                                        />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="row">
                                                        <div className="col-md-12 border-2">
                                                            <div className="mb-3 table-responsive">
                                                                <table className="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                Name
                                                                            </th>
                                                                            <th>
                                                                                Approved
                                                                                Start
                                                                                Time
                                                                            </th>
                                                                            <th>
                                                                                Approved
                                                                                Start
                                                                                Time
                                                                            </th>
                                                                            <th>
                                                                                Approved
                                                                                Quantity
                                                                            </th>
                                                                            <th>
                                                                                Action
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="component_body">
                                                                        {requested_components.map(
                                                                            (
                                                                                requested_component,
                                                                                index
                                                                            ) => (
                                                                                <ApplicationApproveComponetList
                                                                                    id={
                                                                                        requested_component.id
                                                                                    }
                                                                                    name={
                                                                                        requested_component.name
                                                                                    }
                                                                                    i={
                                                                                        index
                                                                                    }
                                                                                ></ApplicationApproveComponetList>
                                                                            )
                                                                        )}
                                                                        <input
                                                                            type="hidden"
                                                                            name="total_component"
                                                                            value={
                                                                                requested_components.length
                                                                            }
                                                                        />
                                                                        <div id="component_section">
                                                                            {/* @php $i=0; @endphp
                                                                    @foreach($requested_components as $component)
                                                                @if($component->is_approved=="pending")
                                                                    <tr id=@php echo "row".$component["id"]; @endphp>
                                                                    <input type="hidden" name='@php echo "component[".$i."][id]"; @endphp' value={{ $component["id"]}}>
                                                                        <td>{{ $component['name']}}</td>
                                                                        <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name=@php echo "component[".$i."][approved_start_time]"; @endphp placeholder='hh:mm tm'></td>
                                                                        <td><input className='form-control' data-inputmask="'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name=@php echo "component[".$i."][approved_end_time]"; @endphp placeholder='hh:mm tm'></td>
                                                                        <td><input type='number' className='form-control' id='exampleInputMobile' placeholder='Quantity' name=@php echo "component[".$i."][approved_quantity]"; @endphp></td>
                                                                        <td><a className="btn btn-danger" onclick="reject({{$component['id']}},'{{$component->application_id}}')">Reject Component</a></td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                    @endif
                                                                    @endforeach
                                                                    <input type="hidden" name='total_component' value={{ $i }}/> */}
                                                                        </div>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div className="col-md-12">
                                                            <button
                                                                className="btn btn-primary me-1 mb-1"
                                                                type="submit"
                                                            >
                                                                {" "}
                                                                Approve
                                                            </button>
                                                            <a
                                                                className="btn btn-danger me-1 mb-1"
                                                                onclick="reject_full_application('{{$application_info->application_id}}')"
                                                            >
                                                                Reject
                                                                Application
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        )}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
};

export default ApplicationRead;
