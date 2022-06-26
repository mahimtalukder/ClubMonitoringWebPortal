<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])


@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 border-end-lg">
                            <div class="aside-content">
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                        <span class="icon"><i data-feather="chevron-down"></i></span>
                                    </button>
                                    <div class="order-first">
                                        <h4>Application Service</h4>
                                        <p class="text-muted">AIUB SOCIAL WELFARE CLUB - SHOMOY</p>
                                    </div>
                                </div>
                                <div class="d-grid my-3">
                                    <a class="btn btn-primary" href="compose.html">Create Application</a>
                                </div>
                                <div class="email-aside-nav collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="inbox.html">
                                                <i data-feather="inbox" class="icon-lg me-2"></i>
                                                Approved Application
                                                <span class="badge bg-danger fw-bolder ms-auto">2
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#">
                                                <i data-feather="mail" class="icon-lg me-2"></i>
                                                Under Review
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#">
                                                <i data-feather="briefcase" class="icon-lg me-2"></i>
                                                Rejected Application
                                                <span class="badge bg-secondary fw-bolder ms-auto">4
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div>
                                <div class="d-flex align-items-center p-3 border-bottom tx-16">
                                    <span data-feather="edit" class="icon-md me-2"></span>
                                    New Application
                                </div>
                            </div>
                            <div class="p-3 pb-0">
                                <div class="to">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">To:</label>
                                        <div class="col-md-10">
                                            <select class="compose-multiple-select form-select" multiple="multiple">
                                                <option value="AL">Directors</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="subject">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Subject</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="date">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" inputmode="numeric">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="px-3">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="simpleMdeEditor">Descriptions </label>
                                        <textarea class="form-control" name="tinymce" id="simpleMdeEditor" rows="5"></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="simpleMdeEditor">Components </label>
                                        <div class="row">
                                            <div class="col-11">
                                                <select class="compose-multiple-select form-select" multiple="multiple">
                                                    <option value="AL">Directors</option>
                                                    <option value="AL">Directors</option>
                                                    <option value="AL">Directors</option>
                                                    <option value="AL">Directors</option>
                                                    <option value="AL">Directors</option>
                                                </select>
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-primary" type="add"> Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 border-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="simpleMdeEditor">Added Component List</label>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Quantity</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Multipurpose</td>
                                                <td>
                                                    <input class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="hh:mm tt" inputmode="numeric">
                                                </td>
                                                <td>
                                                    <input class="form-control" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="hh:mm tt" inputmode="numeric">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="exampleInputMobile" placeholder="Quantity">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary me-1 mb-1" type="submit"> Send</button>
                                        <button class="btn btn-secondary me-1 mb-1" type="button"> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
