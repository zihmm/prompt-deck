@extends('foundation/layout', [
	'viewName' => 'error'
])

@section('main')
	<main>
		<p>{{ $message }}</p>
	</main>
@endsection