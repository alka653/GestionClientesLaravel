<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<title>
			@yield('title', 'Agenda Ministerio')
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="{{ mix('/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ mix('/css/dashboard.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ mix('/css/app.min.css') }}" rel="stylesheet" type="text/css">
		@yield('style')
	</head>
	<body>
		<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
		@yield('content')
		<div class="load"></div>
		<div id="Modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true"></div>
		<script src="{{ mix('/js/jquery.min.js') }}"></script>
		<script src="{{ mix('/js/popper.js') }}"></script>
		<script src="{{ mix('/js/bootstrap.min.js') }}"></script>
		<script src="{{ mix('/js/modernizer.min.js') }}"></script>
		<script src="{{ mix('/js/waves.js') }}"></script>
		<script src="{{ mix('/js/jquery.slimscroll.js') }}"></script>
		<script src="{{ mix('/js/jquery.nicescroll.js') }}"></script>
		<script src="{{ mix('/js/jquery.scrollTo.min.js') }}"></script>
		<script src="{{ mix('/js/dashboard.js') }}"></script>
		<script src="{{ mix('/js/app.min.js') }}"></script>
		@yield('script')
	</body>
</html>