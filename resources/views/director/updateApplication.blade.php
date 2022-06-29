<?php $director = session()->get('director')?>
@extends('layouts.directorLayout')
@section('title', 'Dashboard')
@php $picture = '../../'.$director['images']; @endphp
@section('picture', $picture)
@section('name', $director['name'])
@section('phone', $director['phone'])
@section('club_name', $club['name'])



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
                                    Application
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>All fields are required</li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form class="forms-sample" action="{{route('directorApplicationUpdateSubmitted')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name='application_id' value={{$application_info["application_id"]}}>
                                <div class="p-3 pb-0">
                                    <div class="to">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">To:</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" id="exampleInputDisabled1" disabled="" value="Director">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="subject">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Subject</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" disabled="" value={{$application_info["subject"]}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="subject">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Request Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text"  disabled="" value={{$application_info["request_date"]}}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="date">
                                        <div class="row mb-3">
                                            <label class="col-md-2 col-form-label">Approved Date</label>
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
                                            <textarea class="form-control" rows="5" disabled=""  >{{$application_info["description"]}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 border-2">
                                        <div class="mb-3">
                                            <label class="form-label" for="simpleMdeEditor">Component List</label>
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Requested Start Time</th>
                                                    <th>Approved Start Time</th>
                                                    <th>Requested End Time</th>
                                                    <th>Approved Start Time</th>
                                                    <th>Requested Quantity</th>
                                                    <th>Approved Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody id="component_body">
                                                    <div id="component_section">
                                                        @php $i=0; @endphp
                                                        @foreach($requested_components as $component)
                                                            <tr id=@php echo "row".$component["id"]; @endphp>
                                                                <input type="hidden" name='@php echo "component[".$i."][id]"; @endphp' value={{$component["id"]}}>
                                                                <td>{{$component['name']}}</td>
                                                                <td>{{$component['start_time']}}</td>
                                                                <td><input class='form-control' data-inputmask= "'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name=@php echo "component[".$i."][approved_start_time]"; @endphp placeholder='hh:mm tm'></td>
                                                                <td>{{$component['end_time']}}</td>
                                                                <td><input class='form-control' data-inputmask= "'alias':'datetime'" data-inputmask-inputformat='hh:mm tt' inputmode='numeric' name=@php echo "component[".$i."][approved_end_time]"; @endphp placeholder='hh:mm tm'></td>
                                                                <td>{{$component['quantity']}}</td> 
                                                                <td><input type='number' class='form-control' id='exampleInputMobile' placeholder='Quantity' name=@php echo "component[".$i."][approved_quantity]"; @endphp></td>
                                                                <td><a class="btn btn-primary" onclick="reject({{$component['id']}},'{{$component->application_id}}')">Reject</a></td> 
                                                            </tr>
                                                            @php $i++; @endphp
                                                        @endforeach
                                                        <input type="hidden" name='total_component' value={{$i}}>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" name='total_componet' id='total_componet' value=0>

                                    <div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary me-1 mb-1" type="submit"> Approve</button>
                                            <a class="btn btn-secondary me-1 mb-1" onclick="reject_full_application('{{$component->application_id}}')">Reject</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var reject_function;
        // this is jQuery function
        $(function(){
            reject_function = function(id,application_id)
            {
                new Attention.Prompt({
                title: 'Reject Component',
                content: 'Please enter a remark:',
                onSubmit: function(component, value) {
                    var url = "{{route('directorRemoveComponent',['id'=>":id",'application_id'=>":application_id",'remarks'=>":remarks"])}}";
                    url = url.replace(':id', id);
                    url = url.replace(':application_id', application_id);
                    url = url.replace(':remarks', value);
                    window.location.href=url;
                }
                });
            }
        })
        // This is javascript function
        function reject(id,application_id )
        {
            reject_function(id,application_id);
        }


        var reject_application;
        // this is jQuery function
        $(function(){
            reject_application = function(application_id)
            {
                new Attention.Prompt({
                title: 'Reject Full Component',
                content: 'Please enter a remark:',
                onSubmit: function(component, value) {
                    var url = "{{route('directorRejectApplication',['application_id'=>":application_id",'remarks'=>":remarks"])}}";
                    url = url.replace(':application_id', application_id);
                    url = url.replace(':remarks', value);
                    window.location.href=url;
                }
                });
            }
        })
        // This is javascript function
        function reject_full_application(application_id )
        {
            reject_application(application_id);
        }
    </script>

@endsection
