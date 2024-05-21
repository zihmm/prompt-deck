<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }}</title>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	@vite('resources/sass/app.scss')
</head>
<body>
	<div id="app" data-view="{{ $viewName }}">
		<img id="logo" src="{{ asset('/images/logo.svg') }}" width="180">
		<main>
			@yield('main')
		</main>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
	@vite('resources/scripts/app.js')
</body>
</html>