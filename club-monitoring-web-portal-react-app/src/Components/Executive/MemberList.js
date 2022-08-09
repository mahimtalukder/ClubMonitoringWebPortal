import React, {useState, useEffect} from 'react'
import MapMemberList from './MapMemberList'
import AxiosConfig from '../axiosConfig' 
import { useNavigate } from "react-router-dom"

const MemberList = () => {
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [members, setDirectors] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        AxiosConfig.get("executive/list/member")
            .then(resp => {
                setDirectors(resp.data);
                setLoading(false);
            }).catch(err => {
                setLoading(false);
                //navigate("/signin");
                console.log(err);
            });
    };

    return (
        <>
            {loading ? (
                <div className="page-content mx-0 px-0 my-0 py-0">...Data Loading.....</div>
            ) : (
                <div>
                    <div className="page-content mx-0 px-0 my-0 py-0">
                        <div className="row">
                            <div className="col-md-12 grid-margin stretch-card">
                                <div className="card">
                                    <div className="card-body">
                                        <h6 className="card-title">Member List</h6>
                                        <p className="text-muted mb-3">View, Edit and Block/Unblock Members</p>

                                        <div className="table-responsive">
                                            <table id="dataTableExample" className="table">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>ID</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Designation</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {
                                                        members.map(member => (
                                                            <MapMemberList
                                                                name={member.name}
                                                                user_id={member.user_id}
                                                                email={member.email}
                                                                phone={member.phone}
                                                                designation={member.designation}
                                                                status={member.status}
                                                                images={member.images}
                                                            ></MapMemberList>
                                                        ))
                                                    }
                                                    {/* @foreach($directors as $director)
                                            <tr>
                                                <td>
                                                    <img className="wd-30 ht-30 rounded-circle" src={{ asset($director-> images)}}>
                                                </td>
                                                <td>{{ $director-> name}}</td>
                                                <td>{{ $director-> user_id}}</td>
                                                <td>{{ $director-> email}}</td>
                                                <td>{{ $director-> phone}}</td>
                                                <td>{{ $director-> designation}}</td>
                                                <td>
                                                    <a href="/admin/update/director/{{$director->user_id}}" className="btn btn-primary me-1 mb-1">Edit</a>
                                        @if($director->status == 1)
                                                    <a href="/admin/update/status/director/{{$director->user_id}}/0" className="btn btn-danger me-1 mb-1">Block</a>
                                                    @else
                                                    <a href="/admin/update/status/director/{{$director->user_id}}/1" className="btn btn-success me-1 mb-1">Unblock</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach */}
                                                </tbody>
                                            </table>

                                        </div>
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

export default MemberList
