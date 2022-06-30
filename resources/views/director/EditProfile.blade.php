<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', $director['name'])
@php $picture = '../../'.$director['images']; @endphp
@section('picture', $picture)
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
                                <a class="nav-link" href="{{route('directorProfile')}}">About</a>
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
                    <p>{{$director_info->bio}}</p>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Full Name:</label>
                        <p class="text-muted">{{$director_info->name}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">ID:</label>
                        <p class="text-muted">{{$director_info->user_id}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{$director_info->email}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{$director_info->phone}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Date of Birth:</label>
                        <p class="text-muted">{{$director_info->dob}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Blood Group:</label>
                        <p class="text-muted">{{$director_info->blood_group}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                        <p class="text-muted">{{$director_info->address}}</p>
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

                            <form method="post" action="{{route('directorEditProfileSubmitted')}}"  novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" class="form-control @error('name'){{"is-invalid"}}@enderror" name="name" type="text" value="{{$director_info->name}}">

                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror


                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control  @error('email'){{"is-invalid"}}@enderror" name="email" type="email" value="{{$director_info->email}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input id="phone" class="form-control  @error('phone'){{"is-invalid"}}@enderror" name="phone" type="text" value="{{$director_info->phone}}">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="male" id="gender1"  {{ $director_info->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="female" id="gender2" {{ $director_info->gender == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" name="gender" value="Other" id="gender3" {{ $director_info->gender == 'Other' ? 'checked' : '' }}>
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
                                        <input data-provide="datepicker" data-date-format="dd/mm/yyyy" type="text" id="datepicker" name="dob" class="form-control  @error('dob'){{"is-invalid"}}@enderror" value="{{$director_info->dob}}">
                                        <span class="input-group-text input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                    </div>
                                    @error('dob')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Blood Group</label>
                                    <select class="js-example-basic-single form-select select2-hidden-accessible  @error('blood_group'){{"is-invalid"}}@enderror" name="blood_group" id="blood_group" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option name="blood_group" value="" data-select2-id="1">Select blood group</option>
                                        <option name="blood_group" value="a-pos" data-select2-id="3" {{ $director_info->blood_group == 'a-pos' ? 'selected' : '' }}>A+</option>
                                        <option name="blood_group" value="a-neg" data-select2-id="13" {{ $director_info->blood_group == 'a-neg' ? 'selected' : '' }}>A-</option>
                                        <option name="blood_group" value="ab-pos" data-select2-id="14" {{ $director_info->blood_group == 'ab-pos' ? 'selected' : '' }}>AB+</option>
                                        <option name="blood_group" value="ab-neg" data-select2-id="15" {{ $director_info->blood_group == 'ab-neg' ? 'selected' : '' }}>AB-</option>
                                        <option name="blood_group" value="o-pos" data-select2-id="16" {{ $director_info->blood_group == 'o-pos' ? 'selected' : '' }}>O+</option>
                                        <option name="blood_group" value="o-neg" data-select2-id="18" {{ $director_info->blood_group == 'o-neg' ? 'selected' : '' }}>O-</option>
                                        <option name="blood_group" value="b-pos" data-select2-id="17" {{ $director_info->blood_group == 'b-pos' ? 'selected' : '' }}>B+</option>
                                        <option name="blood_group" value="b-neg" data-select2-id="6" {{ $director_info->blood_group == 'b-neg' ? 'selected' : '' }}>B-</option>
                                    </select>
                                    @error('blood_group')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Address</label>
                                    <input id="address" class="form-control" name="address" type="text" value="{{$director_info->address}}">
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
                            <form action="{{route('directorImageUploadsubmitted')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <h6 class="card-title">Change Profile Picture</h6>
                                <p class="text-muted mb-3">Image must be 100X100 px.</p>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="image"  name="image">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="d-none d-md-block">
                                    <button class="btn btn-primary btn-icon-text" type="submit">
                                        <svg href="" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload-cloud"><polyline points="16 16 12 12 8 16"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
                                        Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- right wrapper end -->
    </div>


    </div>


@endsection
