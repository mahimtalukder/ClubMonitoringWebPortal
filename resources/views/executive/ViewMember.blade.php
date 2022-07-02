<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')
<h1>All Members List</h1>
<div class="page-content mx-0 px-0 my-0 py-0">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Data Table</h6>
                    <p class="text-muted mb-3">View, Edit and Block/Unblock Members</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
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
                            @foreach($MemberList as $MemberList)
                            <tr>
                                <td>
                                    <img class="wd-30 ht-30 rounded-circle" src={{asset($MemberList->images)}}>
                                </td>
                                <td>{{$MemberList->name}}</td>
                                <td>{{$MemberList->user_id}}</td>
                                <td>{{$MemberList->email}}</td>
                                <td>{{$MemberList->phone}}</td>
                                <td>{{$MemberList->designation}}</td>
                                <td>
                                    <a href="/executive/update/member/{{$MemberList->user_id}}" class="btn btn-primary me-1 mb-1">Edit</a>
                                    @if($MemberList->status == 1)
                                        <a href="/executive/update/status/member/{{$MemberList->user_id}}/0" class="btn btn-danger me-1 mb-1">Block</a>
                                    @else
                                        <a href="/executive/update/status/member/{{$MemberList->user_id}}/1" class="btn btn-success me-1 mb-1">Unblock</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection