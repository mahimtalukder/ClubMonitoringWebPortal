<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@section('picture', $director['images'])
@section('name', $director['name'])
@section('phone', $director['phone'])
@section('contant') 
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>    
@endsection