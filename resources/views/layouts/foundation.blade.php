<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PromptDeck</title>
	@vite('resources/sass/app.scss')
</head>
<body>
<div id="app"></div>
	@section('main')
	@endsection
	@vite('resources/scripts/app.js')
</body>
</html>