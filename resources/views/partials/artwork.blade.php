<figure class="{{ $type }}">
	@if($artwork)
		<img src="{{ $artwork->toDataUri() }}">
		<div class="prompt-card">
			<p>{{ $prompt }}</p>
		</div>
		<a href="{{ route('vote.post', ['position' => $type]) }}" class="vote {{ $type }}"></a>
	@else
		<div class="broken-image">
			<img src="{{ asset('/images/broken-image.png') }}">
			<span>@lang('file_not_found')</span>
		</div>
	@endif
</figure>