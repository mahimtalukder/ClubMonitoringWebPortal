<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')

@if(!empty($message))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif


<form action="{{route('PostNoticeMamber')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <h3 class="card-title">Send Notice</h3>
    <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input id="name" class="form-control" name="title" type="text" value="">
    </div>
    <div>
        <label for="name" class="form-label">Notice</label>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">With textarea</span>
            </div>
            <textarea class="form-control" name="notice"  aria-label="With textarea"></textarea>
        </div>
    </div>
    <div>
        <label for="name" class="form-label">Attach File</label>
        <div class="mb-3">
            <input class="form-control" type="file" id="image"  name="file">
        </div>
    </div>















    <div class="d-none d-md-block">
        <button class="btn btn-primary btn-icon-text" type="submit">
            Send Notice
        </button>
    </div>
</form>

@endsection