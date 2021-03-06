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
                        @if(!empty($message))
                            <div class="alert alert-success" role="alert">
                                {{$message}}
                            </div>
                        @endif
                        <form class="forms-sample pt-3" action="{{route('directorAddComponents')}}" method="post">
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Name</label>
                                <input type="text" class="form-control  @error('name') {{"is-invalid"}} @enderror" id="exampleInputUsername1" name="name" placeholder="Component Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" class="form-control @error('description') {{"is-invalid"}} @enderror" id="exampleInputEmail1" name="description" placeholder="Component Description">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
                            {{$components->links('inc.paginator') }}
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Added By</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($components as $component)
                                    <tr>
                                        <td>{{$component->id}}</td>
                                        <td>{{$component->name}}</td>
                                        <td>{{$component->description}}</td>
                                        <td>{{$component->added_by}}</td>
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
