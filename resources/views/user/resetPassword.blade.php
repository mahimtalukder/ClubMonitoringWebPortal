@extends('layouts.auth')
@section('title', "Reset Password")
@section('contant')
    <div class="row">
        <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper">

            </div>
        </div>
        <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
                <a href="{{route('home')}}" class="noble-ui-logo d-block mb-2">CM<span>WP</span></a>
                @if (!empty($message))
                    <div class="alert alert-success" role="alert">
                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                        {{$message}}
                    </div>
                    <h6 class="card-title text-primary"></h6>
                @endif
                @if (!empty($error_message))
                    <h5 class="text-danger">{{$error_message}}</h5>
                @endif
                <form class="forms-sample" action="{{route('resetPasswordSubmitted')}}" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="id" class="form-label">Enter Id</label>
                        <input type="text" class="form-control" id="id" name="user_id" placeholder="XX-XXXXX-XX" value={{$user_id}}>
                        @error('id')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="otp" class="form-label">OTP</label>
                        <input type="text" class="form-control" id="otp" name="otp" placeholder="otp">
                        @error('otp')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @error('password')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        @error('confirm_password')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            Reset
                        </button>
                    </div>
                    <a href="{{route('signin')}}" class="d-block mt-3 text-muted">Already
                        a user? Sign in</a>
                </form>
            </div>
        </div>
    </div>
@endsection