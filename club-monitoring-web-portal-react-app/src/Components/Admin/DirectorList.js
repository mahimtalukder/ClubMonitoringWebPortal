import React, {useState, useEffect} from 'react'
import MapDirectorList from './MapDirectorList'
import AxiosConfig from '../axiosConfig' 
import { useNavigate } from "react-router-dom"

const DirectorList = () => {
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [directors, setDirectors] = useState([]);

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        AxiosConfig.get("admin/list/director")
            .then(resp => {
                setDirectors(resp.data);
                setLoading(false);
            }).catch(err => {
                setLoading(false);
                navigate("/signin");
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
                                        <h6 className="card-title">Director List</h6>
                                        <p className="text-muted mb-3">View, Edit and Block/Unblock Directors</p>

                                        {/* @if(!empty($message))
                                <div className="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                                @endif */}

                                        <div className="table-responsive">
                                            <table id="dataTableExample" className="table">
                                                <thead>
                                                    <tr>
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
                                                        directors.map(director => (
                                                            <MapDirectorList
                                                                name={director.name}
                                                                user_id={director.user_id}
                                                                email={director.email}
                                                                phone={director.phone}
                                                                designation={director.designation}
                                                                status={director.status}
                                                                images={director.images}
                                                            ></MapDirectorList>
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

export default DirectorList
