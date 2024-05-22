@extends('foundation/layout', [
	'viewName' => 'quest'
])

@section('main')
	<div class="label">@lang('round') <span class="red">01</span></div>
	<h1>Feuerspeiende Pinguine in einem Superheldenkostüm in einer tropischen Umgebung</h1>
	<div class="countdown-wrapper">
		<button id="start-countdown">
			<span>@lang('button_start')</span>
		</button>
		<div id="countdown"></div>
		<a href="/vote" class="done hide">@lang('time_out') →</a>
	</div>
@endsection