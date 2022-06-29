<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@php $picture = '../../'.$director['images']; @endphp
@section('picture', $picture)
@section('name', $director['name'])
@section('phone', $director['phone'])



@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include(('inc.directorApplicationSideNav'))
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
                                        <form method="get" action = "">
                                            {{@csrf_field()}}
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Search applications..." name="search">
                                                <button class="btn btn-light btn-icon" type="submit" id="button-search-addon"><i data-feather="search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{$applications->links('inc.paginator') }}
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
                                    <a href="{{route('directorApplicationRead',['id' => $application->application_id])}}" class="email-list-detail">
                                        <div class="content">
                                            <span class="from">{{$application->subject}}</span>
                                            <p class="msg">{{$application->description}}</p>
                                        </div>
                                        <span class="date">{{date("M d, Y", strtotime($application->created_at))}}</span>
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
