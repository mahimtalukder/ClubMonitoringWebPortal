import React, {useState, useEffect} from 'react'
import MapViewNotice from './MapViewNotice'
import AxiosConfig from '../axiosConfig' 
import { useNavigate } from "react-router-dom"

const ViewNotece = () => {
    const [loading, setLoading] = useState(false);
    const navigate = useNavigate();
    const [notices, setnotice] = useState([]);
    let user = JSON.parse(localStorage.getItem("user"));

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = () => {
        setLoading(true);
        var obj = {
            club_id: user.club_id,
        };
        AxiosConfig.get("/executive/ViewNotice",obj)
            .then(resp => {
                setnotice(resp.data);
                setLoading(false);
            }).catch(err => {
                setLoading(false);
                //navigate("/signin");
                console.log(err);
            });
    };

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
                        <h3>Notices</h3>
                            {
                            notices.map(notice => (
                                <MapViewNotice
                                    title={notice.title}
                                    notice={notice.notice}
                                    created_at={notice.created_at}
                                ></MapViewNotice>
                            ))
                        }


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


{/* <div class="example">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">
Launch demo modal
</button>
<div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">{ notice.title }</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">{notice.notice }</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div> */}

       </div>
    )
}

export default ViewNotece
