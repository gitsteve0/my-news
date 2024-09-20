<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>News • Login</title>

	<link rel="stylesheet" href="{{ asset('static/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('static/assets/css/kaiadmin.css') }}">

	@stack('css')
</head>

<body>
<div class="wrapper pt-5 mt-5">
	<div class="w-25 mx-auto border bg-white shadow p-3 mt-5 rounded">
		<div class="fs-4 fw-semibold mb-3">News app Login</div>
		<form action="{{ route('panel.login') }}" method="POST" class="d-flex gap-3 flex-column">
			@csrf
			<div class="form-group">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="username" id="username" autofocus>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" type="password" name="password" id="password" autocomplete="current-password">
			</div>

			<div class="form-group">
				<label for="remember">Remember me</label>
				<input class="form-check" type="checkbox" name="remember" id="remember" autofocus>
			</div>

			<div>
				<button type="submit" class="btn btn-primary btn-icon-text mb-2 mb-md-0">Login</button>
			</div>
		</form>
	</div>
</div>
</body>

</html>
