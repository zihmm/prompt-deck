@extends('foundation/layout', [
	'viewName' => 'rounds'
])

@section('main')
	<div class="label">Round <span class="red">01</span></div>
	<h1>Feuerspeiende Pinguine in einem Superheldenkostüm in einer tropischen Umgebung</h1>
	<div class="countdown-wrapper">
		<button id="start-countdown">
			<span>Lets go</span>
		</button>
		<div id="countdown"></div>
		<div class="done hide">Hands up!</div>
	</div>
@endsection