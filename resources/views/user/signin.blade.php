@extends('layouts.auth')
@section('contant')
    <div class="row">
        <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper">

            </div>
        </div>
        <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
                <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                @if (!empty($error_message))
                    <h5 class="text-danger">{{$error_message}}</h5>
                @endif
                <form class="forms-sample" action="{{route('signinSubmitted')}}" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="XX-XXXXX-XX">
                        @error('id')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @error('password')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            Login
                        </button>
                    </div>
                    <a href="{{route('singup')}}" class="d-block mt-3 text-muted">Not a user? Sign
                        up</a>
                </form>
            </div>
        </div>
    </div>
@endsection