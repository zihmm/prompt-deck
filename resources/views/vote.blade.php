@php use App\Enums\ActorPositionEnum; @endphp
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
				'type' => ActorPositionEnum::Left->value,
				'artwork' => $artworks[ActorPositionEnum::Left->value]
			])
			@include('partials/artwork', [
				'type' => ActorPositionEnum::Right->value,
				'artwork' => $artworks[ActorPositionEnum::Right->value]
			])
		</div>
	</section>
@endsection