<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', $director['name'])
@section('picture', $director['images'])
@section('name', $director['name'])
@section('phone', $director['phone'])
@section('content')
    <div class="page-content mx-0 px-0 my-0 py-0">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                @include('inc.directorHeader')
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                    <div class="d-flex align-items-center m-0 p-0">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile')}}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" >Edit Profile</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="card-title mb-0">Overview</h6>
                    </div>
                    <p>{{$director->bio}}</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Full Name:</label>
                        <p class="text-muted">{{$director->name}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">ID:</label>
                        <p class="text-muted">{{$director->id}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{$director->email}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{$director->phone}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Date of Birth:</label>
                        <p class="text-muted">{{$director->dob}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Blood Group:</label>
                        <p class="text-muted">{{$director->blood_group}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{$director->address}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- right wrapper start -->
        <div class="col-md-8 col-xl-9 right-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title pb-3">Update personal information</h4>

                            <form method="post" action="{{route('editProfileSubmitted')}}" id="signupForm" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" class="form-control @error('name'){{"is-invalid"}}@enderror" name="name" type="text" value="{{old('name')}}">

                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror


                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control  @error('email'){{"is-invalid"}}@enderror" name="email" type="email" value="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input id="phone" class="form-control  @error('phone'){{"is-invalid"}}@enderror" name="phone" type="text" value="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="Male" id="gender1">
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="Female" id="gender2">
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

                                    @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <div class="input-group date datepicker mx-0 px-0">
                                        <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" name="dob" class="form-control  @error('dob'){{"is-invalid"}}@enderror" value="{{old('dob')}}">
                                        <span class="input-group-text input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                    </div>
                                    @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <select class="js-example-basic-single form-select select2-hidden-accessible  @error('blood_group'){{"is-invalid"}}@enderror" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="1">Select blood group</option>
                                        <option value="a-pos" data-select2-id="3">A+</option>
                                        <option value="a-neg" data-select2-id="13">A-</option>
                                        <option value="ab-pos" data-select2-id="14">AB+</option>
                                        <option value="ab-neg" data-select2-id="15">AB-</option>
                                        <option value="o-pos" data-select2-id="16">O+</option>
                                        <option value="o-neg" data-select2-id="16">O-</option>
                                        <option value="b-pos" data-select2-id="16">B+</option>
                                        <option value="b-neg" data-select2-id="16">B-</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Address</label>
                                    <input id="address" class="form-control" name="address" type="text" value="{{old('address')}}">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="termsCheck">
                                            Agree to <a href="#"> terms and conditions </a>
                                        </label>
                                        <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Change Profile Picture</h6>
                            <p class="text-muted mb-3">Image must be 100X100 px.</p>
                            <div class="mb-3">
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="d-none d-md-block">
                                <button class="btn btn-primary btn-icon-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- right wrapper end -->
    </div>


    </div>


@endsection