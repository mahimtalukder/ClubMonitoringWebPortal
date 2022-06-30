<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')
<h1>All Members List</h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User_id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($MemberList as $MemberList)
                <tr>
                    <td>{{$MemberList['user_id']}}</td>
                    <td>{{$MemberList['name']}}</td>
                    <td>{{$MemberList['email']}}</td>
                    <td>{{$MemberList['designation']}}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-icon-text">Edit</a>
                        {{-- /admin/editEmployee/{{$employee['username']}} --}}
                   
                        <a href="" class="btn btn-danger btn-icon-text">Block</a>
                        <a href="" class="btn btn-danger btn-icon-text">Delete</a>
                        {{-- /admin/employeeDelete/{{$employee['username']}} --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection