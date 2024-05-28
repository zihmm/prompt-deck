<?php

namespace App\Contracts;

use App\Entities\Round;
use App\Enums\ActorPosition;
use Carbon\Carbon;
use Illuminate\Support\Collection;

interface Repository
{
	/**
	 * Get current round
	 *
	 * @return Round|null
	 */
	public function getCurrentRound(): ?Round;

	/**
	 * Flag the winner
	 *
	 * @param int $roundNr
	 * @param ActorPosition $position
	 * @return self
	 */
	public function flagWinner(int $roundNr, ActorPosition $position): self;

	/**
	 * Finish / close the cound
	 *
	 * @param int $roundNr
	 * @param Carbon $date
	 * @return self
	 */
	public function finishedAt(int $roundNr, Carbon $date): self;
}