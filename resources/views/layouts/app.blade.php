<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My news</title>
    <link rel="stylesheet" href="{{ asset('static/css/bootstrap.5.2.1.min.css') }}">
</head>
<body>
@include('shared.header')
<div class="container">
    @yield('content')
</div>
@include('shared.footer')

<script src="{{ asset('static/js/bootstrap.5.2.1.min.js') }}"></script>
</body>
</html>
