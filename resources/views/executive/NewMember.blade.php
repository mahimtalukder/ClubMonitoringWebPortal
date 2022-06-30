<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')
<h1>Create New Member</h1>
<form class="forms-sample" {{ route('executiveCreateMambersubmitted')}} method="POST">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">User Name</label>
        <input type="text" class="form-control" name="name" placeholder="Username">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">ID</label>
        <input type="text" class="form-control" name="user_id" placeholder="13-XXXXX-3">
    </div>
    <div class="mb-3">
        <label for="exampleInputUsername1" class="form-label">CLUB ID</label>
        <input type="text" class="form-control" name="club_id" placeholder="">
    </div>
    <div class="mb-3">
        <label for="userEmail" class="form-label">Email
        Address</label>
        <input type="email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="userPassword" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    {{-- <div>
        <button type="button"  type="submit" class="btn btn-primary text-white me-2 mb-2 mb-md-0">
        Create Member 
        </button>
    </div> --}}
    <input class="btn btn-primary" type="submit" value="Submit">
    </form>

@endsection