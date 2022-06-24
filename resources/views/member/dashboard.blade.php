<?php $member = session()->get('member')?>
@extends('layouts.memberLayout')
@section('title', 'Dashboard')
@section('picture', $member['images'])
@section('name', $member['name'])
@section('phone', $member['phone'])
@section('contant') 
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
    </div>    
@endsection