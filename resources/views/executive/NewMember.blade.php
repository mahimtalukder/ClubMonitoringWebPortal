<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')
{{-- <h1>Create New Member</h1> --}}
<div class="page-content mx-0 px-0 my-0 py-0">
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Create Member's Account</h6>
                    <div class="alert alert-dark" role="alert">
                        After successful account creation, Unique ID and password will be sent to the provided email address. Remember, login credentials is only accessible from Members email.
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter full name">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" placeholder="Enter Designation">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" placeholder="Enter email address">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" placeholder="Enter phone number">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <select class="js-example-basic-single form-select select2-hidden-accessible  @error('blood_group'){{"is-invalid"}}@enderror" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="blood_group" value="" data-select2-id="1">Select blood group</option>
                                        <option name="blood_group" value="a-pos" data-select2-id="3">A+</option>
                                        <option name="blood_group" value="a-neg" data-select2-id="13">A-</option>
                                        <option name="blood_group" value="ab-pos" data-select2-id="14">AB+</option>
                                        <option name="blood_group" value="ab-neg" data-select2-id="15">AB-</option>
                                        <option name="blood_group" value="o-pos" data-select2-id="16">O+</option>
                                        <option name="blood_group" value="o-neg" data-select2-id="17">O-</option>
                                        <option name="blood_group" value="b-pos" data-select2-id="18">B+</option>
                                        <option name="blood_group" value="b-neg" data-select2-id="19">B-</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->

                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="male" id="gender1">
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="female" id="gender2">
                                            <label class="form-check-label" for="gender2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="Other" id="gender3">
                                            <label class="form-check-label" for="gender3">
                                                Other
                                            </label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <div class="input-group date datepicker mx-0 px-0">
                                        <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" name="dob" class="form-control">
                                        <span class="input-group-text input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                    </div>
                                    @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter Address">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <form class="forms-sample" {{ route('executiveCreateMambersubmitted')}} method="POST">
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
    <input class="btn btn-primary" type="submit" value="Submit">
    </form> --}}

@endsection