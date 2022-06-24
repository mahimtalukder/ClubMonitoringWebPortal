<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('contant') 
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>    
@endsection