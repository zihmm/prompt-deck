<?php

namespace App\Services;

use App\Enums\ActorPosition;
use Illuminate\Support\Facades\Storage;

final class PromptService
{
	protected int $promptExcerpt = 300;

	public function __construct(
		protected RoundService $roundService
	) { }

	public function display(ActorPosition $actorPosition): ?string
	{
		try
		{
			$content = trim(Storage::disk('dropbox')->get(sprintf("%s/%s/prompt.txt",
				$actorPosition->value,
				$this->roundService->current()->getName()
			)));

			if (empty($content))
			{
				return null;
			}

			return strlen($content) > $this->promptExcerpt
				? substr($content, 0, $this->promptExcerpt) . '...'
				: $content;
		}
		catch (\Exception $exception)
		{
			return null;
		}
	}
}