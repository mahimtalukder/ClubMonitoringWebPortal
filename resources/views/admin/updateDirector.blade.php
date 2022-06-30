<?php $admin = session()->get('admin')?>
@extends('layouts.adminLayout')
@section('title', 'Update Director')
@php $picture = '../../'.$admin['images']; @endphp
@section('picture', $picture)
@section('name', $admin['name'])
@section('phone', $admin['phone'])
@section('content')
    <div class="page-content mx-0 px-0 my-0 py-0">
        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Update Director's Account</h6>

                        <form action="/admin/update/director/{{$director->user_id}}" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control  @error('name'){{"is-invalid"}}@enderror" placeholder="Enter full name" name="name" value="{{$director->name}}">

                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label  @error('designation'){{"is-invalid"}}@enderror">Designation</label>
                                        <input type="text" class="form-control" placeholder="Enter Designation" name="designation" value="{{$director->designation}}">

                                        @error('designation')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control @error('email'){{"is-invalid"}}@enderror" placeholder="Enter email address" name="email" value="{{$director->email}}">

                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control @error('phone'){{"is-invalid"}}@enderror" placeholder="Enter phone number" name="phone" value="{{$director->phone}}">
                                        @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <select class="form-select  @error('blood_group'){{"is-invalid"}}@enderror" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1"  >
                                            <option name="blood_group" value="" data-select2-id="1">Select blood group</option>
                                            <option name="blood_group" value="a-pos" data-select2-id="3" {{ $director->blood_group == 'a-pos' ? 'selected' : '' }}>A+</option>
                                            <option name="blood_group" value="a-neg" data-select2-id="13" {{ $director->blood_group == 'a-neg' ? 'selected' : '' }}>A-</option>
                                            <option name="blood_group" value="ab-pos" data-select2-id="14" {{ $director->blood_group == 'ab-pos' ? 'selected' : '' }}>AB+</option>
                                            <option name="blood_group" value="ab-neg" data-select2-id="15" {{ $director->blood_group == 'ab-neg' ? 'selected' : '' }}>AB-</option>
                                            <option name="blood_group" value="b-pos" data-select2-id="17" {{ $director->blood_group == 'b-pos' ? 'selected' : '' }}>B+</option>
                                            <option name="blood_group" value="b-neg" data-select2-id="14" {{ $director->blood_group == 'b-neg' ? 'selected' : '' }}>B-</option>
                                            <option name="blood_group" value="o-pos" data-select2-id="12" {{ $director->blood_group == 'o-pos' ? 'selected' : '' }}>O+</option>
                                            <option name="blood_group" value="o-neg" data-select2-id="11" {{ $director->blood_group == 'o-neg' ? 'selected' : '' }}>O-</option>
                                        </select>
                                        @error('blood_group')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="male" id="gender1" {{ $director->gender == 'male' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="female" id="gender2" {{ $director->gender == 'female' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender2">
                                                    Female
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="gender" value="Other" id="gender3" {{ $director->gender == 'Other' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender3">
                                                    Other
                                                </label>
                                            </div>

                                        </div>

                                        @error('gender')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <div class="input-group date datepicker mx-0 px-0">
                                            <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" name="dob" class="form-control  @error('dob'){{"is-invalid"}}@enderror" value="{{$director->dob}}">
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
                                        <input type="text" class="form-control @error('address'){{"is-invalid"}}@enderror" placeholder="Enter Address" name="address" value="{{$director->address}}">
                                        @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <button type="submit" class="btn btn-primary submit">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
