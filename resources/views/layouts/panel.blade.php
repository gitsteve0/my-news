<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>News</title>

	<link rel="stylesheet" href="{{ asset('static/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/css/demo.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/css/kaiadmin.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/js/plugin/datatables-bs5/dataTables.bootstrap5.min.css') }}">

	@stack('css')
</head>

<body>
	<div class="wrapper">
		@include('panel.shared.sidebar')
		<div class="main-panel">
			@include('panel.shared.navbar')
			@yield('content')
			@include('panel.shared.footer')
		</div>
	</div>

	<script src="{{ asset('static/assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('static/assets/js/core/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ asset('static/assets/js/plugin/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('static/assets/js/plugin/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('static/assets/js/plugin/datatables-bs5/dataTables.bootstrap5.min.js') }}"></script>
	@stack('js')
</body>

</html>
