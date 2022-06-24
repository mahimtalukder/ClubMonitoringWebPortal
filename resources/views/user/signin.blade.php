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
                <form class="forms-sample">
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userEmail"
                            placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword"
                            autocomplete="current-password" placeholder="Password">
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                            Remember me
                        </label>
                    </div>
                    <div>
                        <button type="button"
                            class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
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