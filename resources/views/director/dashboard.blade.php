<?php $director = session()->get('director'); ?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@section('picture', $director['images'])
@section('name', $director['name'])
@section('phone', $director['phone'])
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

    @php $j=0; @endphp
    @foreach($applications as $application)
      <input type="hidden" id=@php echo 'applicationLabel'.$j @endphp value='@php echo $application['label'] @endphp'>
      <input type="hidden" id=@php echo 'totalNumberOfApplication'.$j @endphp value=@php echo $application['value'] @endphp>
      @php $j++; @endphp
    @endforeach
    <input type="hidden" id='totalNumberOfApplicationInstance' value=@php echo $j @endphp>


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

    <div class="row">
      <div class="col-xl-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Total Application of last seven days </h6>
            <canvas id="chartjsAreaAllApplication"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection
