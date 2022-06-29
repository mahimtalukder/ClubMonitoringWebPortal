<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('club_name', $club['name'])

@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include(('inc.applicationSideNav'))
                        <div class="col-lg-9">
                            <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                                <div class="d-flex align-items-center">
                                    @if($application_info->is_approved == "approved")
                                    <i data-feather="check" class="text-success icon-lg me-2"></i>
                                    @endif

                                    @if($application_info->is_approved == "rejected")
                                        <i data-feather="x" class="text-danger icon-lg me-2"></i>
                                    @endif

                                    @if($application_info->is_approved == "pending")
                                        <i data-feather="clock" class="text-muted icon-lg me-2"></i>
                                    @endif
                                    <span>{{$application_info->subject}}</span>
                                </div>
                                <div>
                                    <a href="#"><i data-feather="printer" class="text-muted icon-lg me-2" data-bs-toggle="tooltip" title="Print"></i></a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="text-muted">{{$club->name}}</a>
                                        <span class="mx-2 text-muted">to</span>
                                        <a href="#" class="text-body me-2">{{$application_info->sent_to}}</a>
                                    </div>
                                </div>
                                <div class="tx-13 text-muted mt-2 mt-sm-0">{{date("M d, Y", strtotime($application_info->created_at))}}</div>
                            </div>
                            <div class="p-4">
                                {{$application_info->description}}
                            </div>
                            <div class="p-4 border-bottom" >
                                <div class="mb-3">Requested Date: {{$application_info->request_date}}</div>
                                @if($requested_components->count() != 0)
                                <div class="mb-3">Requested Components</div>
                                <div class="col-md-12 border-2">
                                    <div class="mb-3">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Quantity</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $count=0;
                                            @endphp
                                            @foreach($requested_components as $component)
                                            <tr>

                                                <td>{{$count+1}}</td>
                                                <td>{{$component->name}}</td>
                                                <td>{{$component->start_time}}</td>
                                                <td>{{$component->end_time}}</td>
                                                <td>{{$component->quantity}}</td>
                                                @php
                                                    $count = $count+1;
                                                @endphp
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @if($application_info->is_approved == "approved")
                            <div class="p-3 bg-body">
                                <div class="mb-3">Approved Date: 13/05/2022</div>
                                <div>Approved Components</div>
                                <div class="col-md-12 border-2 mt-3">
                                    <div class="mb-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Quantity</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Multipurpose</td>
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Classroom</td>
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($application_info->is_approved == "rejected")
                                <div class="p-3 bg-warning">
                                    <div class="mb-3"><strong>Application Rejected</strong></div>
                                    <div>Directors Comment:</div>
                                    {{$application_info->rejection_msg}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
