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
                        @include(('inc.applicationSideNav'))
                        <div class="col-lg-9">
                            <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                                <div class="d-flex align-items-center">
                                    <i data-feather="check" class="text-primary icon-lg me-2"></i>
                                    <span>Application Subject</span>
                                </div>
                                <div>
                                    <a href="#"><i data-feather="printer" class="text-muted icon-lg me-2" data-bs-toggle="tooltip" title="Print"></i></a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="text-muted">AIUB SHOMOY CLUB</a>
                                        <span class="mx-2 text-muted">to</span>
                                        <a href="#" class="text-body me-2">Directors</a>
                                    </div>
                                </div>
                                <div class="tx-13 text-muted mt-2 mt-sm-0">Nov 20, 11:20</div>
                            </div>
                            <div class="p-4">
                                <p>Hello,</p>
                                <br>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <br>
                                <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>
                                <br>
                                <p><strong>Regards</strong>,<br> John Doe</p>
                            </div>
                            <div class="p-4 border-bottom" >
                                <div class="mb-3">Requested Date: 12/05/2022</div>
                                <div class="mb-3">Requested Components</div>
                                <div class="col-md-12 border-2">
                                    <div class="mb-3">
                                        <table class="table">
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
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Classroom</td>
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 bg-body">
                                <div class="mb-3">Approved Date: 13/05/2022</div>
                                <div>Approved Components</div>
                                <div class="col-md-12 border-2 mt-3">
                                    <div class="mb-3">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Quantity</th>
                                                <th>Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Multipurpose</td>
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Classroom</td>
                                                <td>8:00 AM</td>
                                                <td>10:00 AM</td>
                                                <td>2</td>
                                            </tr>
                                            </tbody>
                                        </table>
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
