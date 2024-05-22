@extends('foundation/layout', [
	'viewName' => 'vote'
])

@section('main')
	<div id="quest-review">
		<div class="label">@lang('round') <span class="red">01</span></div>
		<h1>Flying spaghetti monster</h1>
	</div>
	<section id="figures">
		<div class="figures-container">
			<figure class="left">
				<img src="/storage/votes/01/left.webp">
			</figure>
			<figure class="right">
				<img src="/storage/votes/01/right.webp">
			</figure>
		</div>
		<nav id="vote">
			<a href="#" class="vote-left">
				<img src="/images/accept.svg" />
			</a>
			<a href="#" class="vote-right">
				<img src="/images/accept.svg" />
			</a>
		</nav>
	</section>
@endsection