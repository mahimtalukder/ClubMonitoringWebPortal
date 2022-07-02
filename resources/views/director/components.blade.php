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
                        <h6 class="card-title">Add Component</h6>

                        <form class="forms-sample pt-3" action="{{route('directorAddComponents')}}" method="post">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Component Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Component Description">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Components</h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Added By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($components as $component)
                                    <tr>
                                        <td>{{$component->id}}</td>
                                        <td>{{$component->name}}</td>
                                        <td>{{$component->discription}}</td>
                                        <td>{{$component->added_by}}</td>
                                        <td>
                                            <a href="" class="btn btn-primary w-100 mb-1">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
