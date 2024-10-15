<?php

namespace App\Services;

use App\Enums\ActorPosition;
use Illuminate\Support\Facades\Storage;

final class PromptService
{
	public function __construct(
		protected RoundService $roundService
	) { }

	public function display(ActorPosition $actorPosition): ?string
	{
		try
		{
			return Storage::disk('dropbox')->get(sprintf("%s/%s/prompt.txt",
				$actorPosition->value,
				$this->roundService->current()->getName()
			));
		}
		catch (\Exception $exception)
		{
			return null;
		}
	}
}