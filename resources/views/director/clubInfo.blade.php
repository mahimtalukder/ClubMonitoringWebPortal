<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML director Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, director, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>MT | Club Info</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/simplemde/simplemde.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/jquery-tags-input/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/dropify/dist/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="{{asset('../assets_2/dist/attention.css')}}" rel="stylesheet">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('../assets_2/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('../assets_2/css/demo1/style.min.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('../assets_2/images/favicon.png')}}" />
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 ps-0">
                            <h4 class="mt-1 mb-1">{{$club}}</h4>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-end">
                                        <td class="text-start">1</td>
                                        <td class="text-start">Total Application</td>
                                        <td>{{$total_application}}</td>
                                    </tr>
                                    <tr class="text-end">
                                        <td class="text-start">2</td>
                                        <td class="text-start">Total Member</td>
                                        <td>{{$total_member}}</td>
                                    </tr>
                                    <tr class="text-end">
                                        <td class="text-start">3</td>
                                        <td class="text-start">Total Executive</td>
                                        <td>{{$total_executive}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="container-fluid w-100">
                        <a href="#" onclick="window.print();" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="printer"
                            id="print" class="me-2 icon-md"></i>Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

