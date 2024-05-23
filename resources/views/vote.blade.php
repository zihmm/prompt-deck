@extends('foundation/layout', [
	'viewName' => 'vote'
])

@section('main')
	<div id="quest-review">
		<div class="label">@lang('round') <span class="red">{{ $round->getName() }}</span></div>
		<h1>{{ $round->prompt }}</h1>
	</div>
	<section id="figures">
		<div class="figures-container">
			<figure class="left">
				<img src="/storage/votes/01/left.webp">
				<a href="{{ route('vote.post', ['position' => 'left']) }}" class="vote"></a>
			</figure>
			<figure class="right">
				<img src="/storage/votes/01/right.webp">
				<a href="{{ route('vote.post', ['position' => 'right']) }}" class="vote"></a>
			</figure>
		</div>
	</section>
@endsection