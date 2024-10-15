<?php

use App\Enums\ActorPosition;
use App\Services\PromptService;
use Illuminate\Support\Facades\App;

beforeEach(function()
{
	$this->service = app()->make(PromptService::class);
});

test('can read prompt', function ()
{
	expect($this->service->display(ActorPosition::Red))->toBe('Your prompt here...');
});