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
		<a href="{{ url('/') }}" id="logo">
			<img src="{{ asset('/images/logo.svg') }}" width="180">
		</a>
		<main>
			@yield('main')
		</main>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
	@vite('resources/scripts/app.js')
	@stack('scripts')
</body>
</html>