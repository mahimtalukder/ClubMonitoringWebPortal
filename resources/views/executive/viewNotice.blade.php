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
                                <h3>Notices</h3>
                                {{$NoticeList->links('inc.paginator') }}

                                <table class="table table-striped mt-2">
                                    <tbody >
                                    @foreach ($NoticeList as $NoticeList)

                                        <tr>
                                            <td id="Title">{{ $NoticeList->title }}</td>
                                            <td class="date" id="Date">{{date("M d, Y", strtotime($NoticeList->created_at))}}</td>
                                            <td class="d-none " id="Notice">{{ $NoticeList->notice }}</td>
                                            <td>
                                                <button type="button" id="modalbtn" data-bs-toggle="modal"
                                                        data-bs-target="#modal_default" class="btn btn-primary ban-h3">
                                                    See
                                                </button>
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
            <!-- right wrapper end -->
        </div>


    </div>


    <div class="example">
        <div class="modal fade" id="modal_default" tabindex="-1"
             aria-labelledby="exampleModalScrollableTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="notice_title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body"> <p id="notice_body"></p> </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $(document ).on("click","#modalbtn",function() {
                var $row = $(this).closest("tr"); // Find the row
                var $Title = $row.find("#Title").text();
                var $Notice = $row.find("#Notice").text();

                $("#notice_title").text($Title);
                $("#notice_body").text($Notice);
            });
        });
    </script>

@endsection
