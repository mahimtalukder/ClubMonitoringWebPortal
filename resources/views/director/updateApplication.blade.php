<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@php $picture = '../../'.$director['images']; @endphp
@section('picture', $picture)
@section('name', $director['name'])
@section('phone', $director['phone'])
@section('club_name', $club['name'])


@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('inc.applicationSideNav')
                        <div class="col-lg-9">
                            <div>
                                <div class="d-flex align-items-center p-3 border-bottom tx-16">
                                    <span data-feather="edit" class="icon-md me-2"></span>
                                    New Application
                                    @if (!empty($message))
                                        <h6 class="card-title text-primary">{{$message}}</h6>
                                    @endif
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>All fields are required</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form class="forms-sample" action="{{route('directorApplicationUpdateSubmitted')}}" method="post">
                                {{csrf_field()}}
                                <div class="p-3 pb-0">
                                    <div class="to">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">To:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="Director">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subject">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Subject</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" disabled="" value={{$application_info["subject"]}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="subject">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Request Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text"  disabled="" value={{$application_info["request_date"]}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="date">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Approved Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" inputmode="numeric" name="date">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="px-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="simpleMdeEditor">Descriptions </label>
                                            <textarea class="form-control" rows="5" disabled=""  >{{$application_info["description"]}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 border-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="simpleMdeEditor">Component List</label>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Requested Start Time</th>
                                                    <th>Approved Start Time</th>
                                                    <th>Requested End Time</th>
                                                    <th>Approved Start Time</th>
                                                    <th>Requested Quantity</th>
                                                    <th>Approved Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody id="component_body">
                                                    <div id="component_section">

                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" name='total_componet' id='total_componet' value=0>

                                    <div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary me-1 mb-1" type="submit"> Send</button>
                                            <a class="btn btn-secondary me-1 mb-1" href="#">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
