@php use App\Enums\ActorPosition; @endphp
@extends('foundation/layout', [
	'viewName' => 'vote'
])

@section('main')
	<div id="quest-review">
		<div class="label">@lang('round') <span class="red">{{ $round->getName() }}</span></div>
		<h1>{{ $round->prompt }}</h1>
	</div>
	<section id="figures" class="loading">
		<div class="figures-container @if(config('promptdeck.show_prompts')) with-prompt-cards @endif">
			@include('partials/artwork', [
				'type' => ActorPosition::White->value,
				'artwork' => $artworks[ActorPosition::White->value],
				'prompt' => $prompts[ActorPosition::White->value]
			])
			@include('partials/artwork', [
				'type' => ActorPosition::Red->value,
				'artwork' => $artworks[ActorPosition::Red->value],
				'prompt' => $prompts[ActorPosition::Red->value]
			])
		</div>
	</section>
@endsection

@push('scripts')
	<script>
		setTimeout(() =>
        {
            document.querySelector('#figures').classList.remove('loading');
            
            gsap.from('figure', {
                y: -100,
                ease: 'power4.out',
                duration: 1.8,
                stagger: 0.1,
                autoAlpha: 0
            })
        }, 800);
	</script>
@endpush