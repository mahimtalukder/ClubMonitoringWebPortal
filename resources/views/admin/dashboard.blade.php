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

    @php $i=0; @endphp
    @foreach($clubs as $club)
      <input type="hidden" id=@php echo 'clubname'.$i @endphp value='@php echo $club['name'] @endphp'>
      <input type="hidden" id=@php echo 'total_menber'.$i @endphp value=@php echo $club['total_member'] @endphp>
      @php $i++; @endphp
    @endforeach
    <input type="hidden" id='total_club' value=@php echo $i @endphp>

    <div class="row">
        <div class="col-xl-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Total user of club monitoring web portal</h6>
                    <canvas id="totalMemberChartjsDoughnut"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title">Total Member based on different club</h6>
              <canvas id="clubInfoChartjsBar"></canvas>
            </div>
          </div>
        </div>
    </div>
    
@endsection
