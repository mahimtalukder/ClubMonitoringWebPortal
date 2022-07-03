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
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Assign Executive</h6>
                        @if(!empty($message))
                            <div class="alert alert-success" role="alert">
                                {{$message}}
                            </div>
                        @endif
                        <form class="forms-sample pt-3" action="" method="post">
                            {{csrf_field()}}

                            <div class="border-bottom pb-3">
                                <label class="form-label">Select a club to assign committee</label>
                                <select class="form-select form-select-lg">
                                    <option selected="">Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="mb-3 mt-3">
                                <label for="exampleInputUsername1" class="form-label">Member ID</label>
                                <input type="text" class="form-control  @error('id') {{"is-invalid"}} @enderror" id="exampleInputUsername1" name="id" placeholder="Enter member's ID">
                                @error('id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Designation</label>
                                <input type="text" class="form-control @error('designation') {{"is-invalid"}} @enderror" id="exampleInputEmail1" name="designation" placeholder="Component Description">
                                @error('designation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Add</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Components</h6>
{{--                        <div class="table-responsive">--}}
{{--                            {{$components->links('inc.paginator') }}--}}
{{--                            <table id="dataTableExample" class="table">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Description</th>--}}
{{--                                    <th>Added By</th>--}}
{{--                                    <th>Action</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($components as $component)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$component->id}}</td>--}}
{{--                                        <td>{{$component->name}}</td>--}}
{{--                                        <td>{{$component->description}}</td>--}}
{{--                                        <td>{{$component->added_by}}</td>--}}
{{--                                        <td>--}}
{{--                                            <a data-toggle="modal" href="#myModal" class="btn btn-primary w-100 mb-1">Edit</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
