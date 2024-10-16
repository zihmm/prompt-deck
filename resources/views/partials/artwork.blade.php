<figure class="artwork {{ $type }} @if(config('promptdeck.show_prompts')) with-prompt @endif">
	@if($artwork && ! config('promptdeck.show_prompts'))
		<img src="{{ $artwork->toDataUri() }}">
		<a href="{{ route('vote.post', ['position' => $type]) }}" class="vote {{ $type }}"></a>
	@elseif($artwork && config('promptdeck.show_prompts'))
		<div class="card-wrapper">
			<div class="card">
				<div class="face image">
					<img src="{{ $artwork->toDataUri() }}">
					<a href="{{ route('vote.post', ['position' => $type]) }}" class="vote {{ $type }}"></a>
				</div>
				@if( ! empty($prompt))
					<div class="face prompt">
						<a href="#close" class="close-prompt">
							<svg height="24px" id="Layer_1" style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" width="24px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect height="2" transform="matrix(0.7071068 -0.7071068 0.7071068 0.7071068 -4.9705629 12)" width="24.6274166" x="-0.3137085" y="11"/><rect height="24.6274166" transform="matrix(0.7071068 -0.7071068 0.7071068 0.7071068 -4.9705629 12)" width="2" x="11" y="-0.3137085"/></svg>
						</a>
						<span>{{ $prompt }}</span>
					</div>
				@endif
			</div>
		</div>
	@else
		<div class="broken-image">
			<img src="{{ asset('/images/broken-image.png') }}">
			<span>@lang('file_not_found')</span>
		</div>
	@endif
</figure>