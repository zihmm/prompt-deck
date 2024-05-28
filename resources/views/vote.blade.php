@php use App\Enums\ActorPosition; @endphp
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
			@include('partials/artwork', [
				'type' => ActorPosition::White->value,
				'artwork' => $artworks[ActorPosition::White->value]
			])
			@include('partials/artwork', [
				'type' => ActorPosition::Red->value,
				'artwork' => $artworks[ActorPosition::Red->value]
			])
		</div>
	</section>
@endsection