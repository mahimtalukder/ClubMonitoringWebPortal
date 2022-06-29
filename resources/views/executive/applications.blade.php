<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $labelName)
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
                            <div class="p-3 border-bottom">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-end mb-2 mb-md-0">
                                            @if($labelName == "Search Results")
                                                <i data-feather="search" class="text-muted icon-lg me-2"></i>
                                            @else
                                                <i data-feather="inbox" class="text-muted me-2"></i>
                                            @endif
                                            <h4 class="me-1">{{$labelName}}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <form method="get" action = "{{route("searchExecutiveApplication")}}">
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
                                    <a href="/executive/application/read/{{$application->application_id}}" class="email-list-detail">
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
