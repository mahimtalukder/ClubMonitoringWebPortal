<?php $admin = session()->get('admin'); ?>
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

    <input type="hidden" id='numberOfadmin' value={{$numberOfuser['admin']}}>
    <input type="hidden" id='numberOfdirector' value={{$numberOfuser['director']}}>
    <input type="hidden" id='numberOfmember' value={{$numberOfuser['member']}}>

    <div class="row">
        <div class="col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Total Member of club monitoring web portal</h6>
                    <canvas id="totalMemberChartjsDoughnut"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
