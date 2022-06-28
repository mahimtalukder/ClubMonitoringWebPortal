<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])


@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include(('inc.applicationSideNav'))
                        <div class="col-lg-9">
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-end mb-2 mb-md-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox text-muted me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                            <h4 class="me-1">{{$labelName}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Search application...">
                                            <button class="btn btn-light btn-icon" type="button" id="button-search-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-none d-md-flex align-items-center flex-wrap">
                                    <span class="me-2">Showing 1-10 of 253</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-end flex-grow-1">

                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
                                        <button class="btn btn-outline-secondary btn-icon" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
                                    </div>
                                </div>
                            </div>
                            <div class="email-list">
                                @foreach($applications as $application)
                                <!-- email list item -->
                                <div class="email-list-item">
                                    <div class="email-list-actions">
                                        @if($application->is_approved == "approved")
                                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                                        @endif

                                        @if($application->is_approved == "pending" or $application->is_approved == "")
                                            <i data-feather="clock" class="icon-lg me-2"></i>
                                        @endif

                                        @if($application->is_approved == "rejected")
                                            <i data-feather="x" class="text-danger icon-lg me-2"></i>
                                        @endif
                                    </div>
                                    <a href="/executive/application/read/{{$application->application_id}}" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">{{$application->subject}}</span>
                                            <p class="msg">{{$application->description}}</p>
                                        </div>
                                        <span class="date">08 Jan</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
