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
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @endif
                        <form class="forms-sample pt-3" action="{{route('directorAssignExecutiveSubmitted')}}" method="post">
                            {{csrf_field()}}

                            <div class="border-bottom pb-3">
                                <label class="form-label">Select a club to assign committee</label>
                                <select class="form-select form-select-lg @error('club_id') {{"is-invalid"}} @enderror" name="club_id">
                                    <option selected="">Open this select menu</option>
                                    @if($selected != 'none')
                                        @foreach($clubs as $club)
                                        <option @if($selected_club->id == $club->id) {{'selected'}} @endif value="{{$club->id}}">{{$club->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach($clubs as $club)
                                            <option value="{{$club->id}}">{{$club->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                                @error('club_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
                            <button type="submit" class="btn btn-primary w-100 me-2">Add to list</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if($selected != "none")
                        <h6 class="card-title">Added Executives for {{$selected_club->name}}</h6>
                        <h6 class="card-header text-success">{{$committee_no}}st Executive Committee</h6>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <th>{{$cart->user_id}}</th>
                                    <td>{{$cart->name}}</td>
                                    <td>{{$cart->designation}}</td>
                                    <td>
                                        <a data-toggle="modal" href="/director/executives/assign/remove/{{$cart->user_id}}" class="btn btn-outline-danger w-100 mb-1">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="alert alert-dark" role="alert">
                                When you add executive, this will show here.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
