<?php $admin = session()->get('admin')?>
@extends('layouts.adminLayout')
@section('title', 'Create Director')
@php $picture = '../../'.$admin['images']; @endphp
@section('picture', $picture)
@section('name', $admin['name'])
@section('phone', $admin['phone'])
@section('content')
    <div class="page-content mx-0 px-0 my-0 py-0">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Table</h6>
                        <p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
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
                                    <th>Blood Group</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($directors as $director)
                                <tr>
                                    <td>
                                        <img class="wd-30 ht-30 rounded-circle" src={{asset($director->images)}}>
                                    </td>
                                    <td>{{$director->name}}</td>
                                    <td>{{$director->id}}</td>
                                    <td>{{$director->email}}</td>
                                    <td>{{$director->phone}}</td>
                                    <td>{{$director->designation}}</td>
                                    <td>{{$director->blood_group}}</td>
                                    <td>{{$director->gender}}</td>
                                    <td>{{$director->address}}</td>
                                    <td>
                                        <a class="btn btn-primary me-1 mb-1">Edit</a>
                                        <a class="btn btn-danger me-1 mb-1">Block</a>
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
