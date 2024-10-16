<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }}</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	@vite('resources/sass/app.scss')
</head>
<body>
	<div id="app" data-view="{{ $viewName }}">
		<a href="{{ url('/') }}" id="logo">
			<img src="{{ asset('/images/yth-logo.svg') }}" width="250">
		</a>
		<main>
			@yield('main')
		</main>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
	<script>
		let countdown_timer = {{ config('promptdeck.countdown_timer') }};
	</script>
	@vite('resources/scripts/app.js')
	@stack('scripts')
</body>
</html>