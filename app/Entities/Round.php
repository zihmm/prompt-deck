<?php

namespace App\Entities;

class Round
{
	public function __construct(
		public int $roundNr,
		public int $battleNr,
		public string $prompt,
		public string $actorLeft = '',
		public string $actorRight = '',
		public bool $isFinal = false
	) { }

	public function getName(): string
	{
		return $this->isFinal
			? __('final')
			: str_pad($this->battleNr, 2, '0', STR_PAD_LEFT);
	}
}