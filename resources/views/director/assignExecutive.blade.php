<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', 'Components')
@php $picture = '../../'.$director['images']; @endphp
@section('picture', $picture)
@section('name', $director['name'])
@section('phone', $director['phone'])



@section('content')
    <div class="page-content mx-0 px-0 my-0 py-0">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">

            </div>
        </div>

    </div>
@endsection
