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
                        @include(('inc.directorExecutiveSideNav'))

                        @if($status == 1)
                            <div class="col-lg-9">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-end mb-2 mb-md-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox text-muted me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                                <h4 class="me-1">{{$selectedClub->name}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="email-list">
                                    @foreach($executive_committes as $committee)
                                        <!-- email list item -->
                                        <div class="email-list-item">
                                            <a href="/director/club/committees/{{$club_id}}/{{$committee->committee_number}}" class="email-list-detail">
                                                <div class="content">
                                                    <span class="from">{{$committee->committee_number}}st Executive Committee</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($status == 2)
                            <div class="col-lg-9">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-end mb-2 mb-md-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox text-muted me-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                                <h4 class="me-1">{{$selectedClub->name}} | {{$committee_no}}st Executive Committee</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Member ID</th>
                                            <th>Designation</th>
                                            <th>Joined At</th>
                                            <th>End At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($executives as $executive)
                                        <tr>
                                            <th>{{$executive->user_id}}</th>
                                            <td>{{$executive->designation}}</td>
                                            <td>{{$executive->join_at}}</td>
                                            <td>{{$executive->end_at}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
