<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML director Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, director, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>MT | @yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{asset('../assets_2/vendors/core/core.css')}}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('../assets_2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
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

    @include('inc.directorSideNav')
	
		<div class="page-wrapper">
					
      @include('inc.directorTopNav')

	<div class="page-content">
        @yield('contant')

	</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
				<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="{{route('home')}}">MT</a>.</p>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{asset('../assets_2/vendors/core/core.js')}}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{asset('../assets_2/vendors/chartjs/Chart.min.js')}}"></script>
  <script src="{{asset('../assets_2/vendors/jquery.flot/jquery.flot.js')}}"></script>
  <script src="{{asset('../assets_2/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
  <script src="{{asset('../assets_2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('../assets_2/vendors/apexcharts/apexcharts.min.js')}}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{asset('../assets_2/vendors/feather-icons/feather.min.js')}}"></script>
	<script src="../assets_2/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{asset('../assets_2/js/dashboard-light.js')}}"></script>
  <script src="{{asset('../assets_2/js/datepicker.js')}}"></script>
	<!-- End custom js for this page -->

</body>

</html>    