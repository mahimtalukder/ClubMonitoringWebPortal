<?php $admin = session()->get('admin'); ?>
@extends('layouts.adminLayout')
@section('title', 'Change Password')
@php $picture = '../../'.$admin['images']; @endphp
@section('picture', $picture)
@section('name', $admin['name'])
@section('phone', $admin['phone'])

@section('content')
    <div class="page-content mx-0 px-0 my-0 py-0">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-2 col-xl-2 left-wrapper">
            </div>
            <!-- left wrapper end -->
            <!-- right wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title pb-3">Change Password</h4>
                                @if (!empty($message))
                                    <div class="alert alert-success" role="alert">
                                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                                        {{ $message }}
                                    </div>
                                    <h6 class="card-title text-primary"></h6>
                                @endif

                                <form method="post" action="{{ route('directorCreateClubSubmitted') }}"
                                    novalidate="novalidate">
                                    {{ csrf_field() }}

                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Currernt Password</label>
                                        <input id="name"
                                            class="form-control @error('current_password') {{ 'is-invalid' }} @enderror"
                                            name="current_password" type="password" placeholder="Current Password">

                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input id="name"
                                            class="form-control @error('new_password') {{ 'is-invalid' }} @enderror"
                                            name="new_password" type="password" placeholder="New Password">

                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input id="name"
                                            class="form-control @error('confirm_password') {{ 'is-invalid' }} @enderror"
                                            name="confirm_password" type="password" placeholder="Confirm Password">

                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Create">
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
