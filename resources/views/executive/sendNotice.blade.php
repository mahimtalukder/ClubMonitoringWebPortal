<?php $executive = session()->get('executive'); ?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
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
                                @if (!empty($message))
                                    <div class="alert alert-success" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                                <form action="{{ route('PostNoticeMamber') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h3 class="card-title">Send Notice</h3>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Title</label>
                                        <input id="name" class="form-control" name="title" placeholder="title" type="text"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Notice</label>
                                        <div class="input-group">
                                            <textarea class="form-control" name="notice" placeholder="Full notice" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>

                                    <div class="d-none d-md-block">
                                        <button class="btn btn-primary btn-icon-text" type="submit">
                                            Send Notice
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
