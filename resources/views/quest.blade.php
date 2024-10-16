@extends('foundation/layout', [
	'viewName' => 'quest'
])

@section('main')
	<div class="label">@lang('round') <span class="red">{{ $round->getName() }}</span></div>
	<h1>{{ $round->prompt }}</h1>
	<div class="countdown-wrapper">
		<button id="start-countdown">
			<span>@lang('button_start')</span>
		</button>
		<div id="countdown"></div>
		<a href="/vote" class="done hide">@lang('time_out') →</a>
		<div class="loader-container" style="visibility: hidden">
			<div class="loader" ></div>
		</div>
	</div>
@endsection