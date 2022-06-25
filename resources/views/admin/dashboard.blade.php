<?php $admin = session()->get('admin')?>
@extends('layouts.adminLayout')
@section('title', 'Dashboard')
@section('picture', $admin['images'])
@section('name', $admin['name'])
@section('phone', $admin['phone'])
@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>
@endsection
