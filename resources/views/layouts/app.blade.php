<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<title>
			@yield('title', 'Dashboard')
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="{{ mix('/css/dashboard.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ mix('/css/app.min.css') }}" rel="stylesheet" type="text/css">
		@yield('style')
	</head>
	<body>
		@yield('content')
		<div class="modal hidden" id="modal"></div>
		<div class="load"></div>
		<script src="{{ mix('/js/app.min.js') }}"></script>
		@yield('script')
	</body>
</html>