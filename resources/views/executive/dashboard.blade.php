<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')

    @php $j=0; @endphp
    @foreach($applications as $application)
        <input type="hidden" id=@php echo 'applicationLabel'.$j @endphp value='@php echo $application['label'] @endphp'>
        <input type="hidden" id=@php echo 'totalNumberOfApplication'.$j @endphp value=@php echo $application['value'] @endphp>
        @php $j++; @endphp
    @endforeach
    <input type="hidden" id='totalNumberOfApplicationInstance' value=@php echo $j @endphp>
    
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
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
