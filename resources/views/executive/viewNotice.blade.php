<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', $executive['name'])
@section('picture', $executive['images'])
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('content')
<h3>Notices</h3>

<div class="email-list">


  @foreach($NoticeList as $NoticeList)
    <!-- email list item -->
      <div class="email-list-item email-list-item--unread">
        <div class="email-list-actions">
          <a class="favorite" href="javascript:;"><span><i data-feather="star"></i></span></a>
        </div>
        <a  class="email-list-detail">
          <div class="content">
            <span class="from"  data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">{{$NoticeList->title}}</span>
            <p class="msg">{{$NoticeList->notice}}</p>
          </div>
          <span class="date">
            {{$NoticeList->created_at}}
          </span>
        </a>
      </div>
  @endforeach



  <div class="example">
    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLongScollable">
      Launch demo modal
    </button> --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLongScollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">{{$NoticeList->title}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
          </div>
          <div class="modal-body">{{$NoticeList->notice}}</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection