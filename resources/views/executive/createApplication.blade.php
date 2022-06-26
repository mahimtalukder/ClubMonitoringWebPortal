<?php $executive = session()->get('executive')?>
@extends('layouts.executiveLayout')
@section('title', 'Dashboard')
@php $picture = '../../'.$executive['images']; @endphp
@section('picture', $picture)
@section('name', $executive['name'])
@section('phone', $executive['phone'])
@section('club_name', $club['name'])

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $( "#add" ).click(function(){
            var selected=[];
            $('#components :selected').each(function(){
                selected[$(this).val()]=$(this).text();
                });
            
            var i = 1;
            $("#component_body").empty();
            $.each(selected, function(key, value){
                if(typeof value != 'undefined'){
                    console.log(value);
                    var html = "<tr> <td>"+i+"</td> <td>"+ value +"</td>";
                        format = '\"\'alias\'' + ':' + '\'datetime\'\"';
                        html += "<td> <input class='form-control' data-inputmask= " +  format + "data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name='start_time" + i + "' placeholder='hh:mm tm'></td>";
                        html += "<td> <input class='form-control' data-inputmask= " +  format + "data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name='end_time" + i + "' placeholder='hh:mm tm'></td>";
                        html += "<td> <input type='number' class='form-control' id='exampleInputMobile' placeholder='Quantity' name='quantity" + i + "'></td></tr>"
                        html += "<input type='hidden' name='component"+i+"'  value='"+ value +"'>"
                    $('#component_body').append(html);
                    i++;
                }
            });
            var total_components = i-1;
            document.getElementById('total_componet').value = total_components;
        });
    });    
</script>


@section('content')
    <div class="row inbox-wrapper">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('inc.applicationSideNav')
                        <div class="col-lg-9">
                            <div>
                                <div class="d-flex align-items-center p-3 border-bottom tx-16">
                                    <span data-feather="edit" class="icon-md me-2"></span>
                                    New Application
                                    @if (!empty($message))
                                        <h6 class="card-title text-primary">{{$message}}</h6>
                                    @endif
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>All fields are required</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form class="forms-sample" action="{{route('executiveApplicationComposeSubmitted')}}" method="post">
                                {{csrf_field()}}
                                <div class="p-3 pb-0">
                                    <div class="to">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">To:</label>
                                            <div class="col-md-10">
                                                <select class="compose-multiple-select form-select" name="sent_to">
                                                    <option value="director">Directors</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subject">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Subject</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="subject" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="date">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" inputmode="numeric" name="date">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="px-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="simpleMdeEditor">Descriptions </label>
                                            <textarea class="form-control" name="description" rows="5"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="simpleMdeEditor">Components </label>
                                            <div class="row">
                                                <div class="col-11">
                                                    <select class="compose-multiple-select form-select" multiple="multiple" id="components" name='components[]'>
                                                        @foreach($components as $component)
                                                            <option value={{$component['id']}}>{{$component['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-1">
                                                    <a class="btn btn-primary" id="add" href="#">Add</a>
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
                                                <tbody id="component_body">
                                                    <div id="component_section">

                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" name='total_componet' id='total_componet' value=0>

                                    <div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary me-1 mb-1" type="submit"> Send</button>
                                            <a class="btn btn-secondary me-1 mb-1" href="{{route('executiveApplicationCompose')}}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
