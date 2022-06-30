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
                <form class="forms-sample" action="{{route('forgotPasswordSubmitted')}}" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="id" class="form-label">Enter Id</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="XX-XXXXX-XX">
                        @error('id')
                            <span class="font-weight-light text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                            Get Reset Code
                        </button>
                    </div>
                    <a href="{{route('signin')}}" class="d-block mt-3 text-muted">Already
                        a user? Sign in</a>
                </form>
            </div>
        </div>
    </div>
@endsection