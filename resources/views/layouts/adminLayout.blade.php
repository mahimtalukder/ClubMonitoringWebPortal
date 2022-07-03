<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Portal | @yield('title')</title>

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
    <link rel="stylesheet" href="{{asset('../assets/vendors/jquery-tags-input/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/dropify/dist/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('../assets_2/vendors/sweetalert2/sweetalert2.min.css')}}">
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
	<div class="main-wrapper">
	<!--Change Needed -->

    @include('inc.adminSideNav')

		<div class="page-wrapper">

      @include('inc.adminTopNav')

	<div class="page-content">
        @yield('content')

	</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="{{route('home')}}">CMWP</a>.</p>
			</footer>
			<!-- partial -->

		</div>
	</div>

    <!-- core:js -->
    <script src="{{asset('../assets_2/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{asset('../assets_2/vendors/simplemde/simplemde.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/dropify/dist/dropify.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('../assets_2/vendors/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{asset('../assets_2/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets_2/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{asset('../assets_2/js/email.js')}}"></script>
    <script src="{{asset('../assets_2/js/timepicker.js')}}"></script>
    <script src="{{asset('../assets_2/js/datepicker.js')}}"></script>
    <script src="{{asset('../assets_2/js/inputmask.js')}}"></script>
    <script src="{{asset('../assets_2/js/select2.js')}}"></script>
    <script src="{{asset('../assets_2/js/typeahead.js')}}"></script>
    <script src="{{asset('../assets_2/js/dropzone.js')}}"></script>
    <script src="{{asset('../assets_2/js/dropify.js')}}"></script>
    <script src="{{asset('../assets_2/js/tags-input.js')}}"></script>
    <script src="{{asset('../assets_2/js/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('../assets_2/js/form-validation.js')}}"></script>
    <script src="{{asset('../assets_2/js/data-table.js')}}"></script>
    <script src="{{asset('../assets_2/js/sweet-alert.js')}}"></script>

    <!-- End custom js for this page -->


	<!-- Plugin js for this page -->
  <script src="{{asset('../assets_2/vendors/chartjs/Chart.min.js')}}"></script>
	<!-- End plugin js for this page -->


	<!-- Custom js for this page -->
  <script src="{{asset('js/chartjs-light.js')}}"></script>
	<!-- End custom js for this page -->

</body>

</html>
