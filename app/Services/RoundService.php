<?php

namespace App\Services;

use App\Contracts\Repository;
use App\Entities\Round;
use App\Enums\ActorPosition;
use App\Exceptions\NoRoundsAvailableException;
use Carbon\Carbon;

class RoundService
{
	public function __construct(
		protected Repository $dataRepository
	) { }

	public function current(): Round
	{
		if ( ! ($round = $this->dataRepository->getCurrentRound()))
		{
			throw new NoRoundsAvailableException(
				__('no_more_rounds_available')
			);
		}

		return $round;
	}

	public function finish(Round $round, ActorPosition $position): void
	{
		$this->dataRepository
			->flagWinner($round->battleNr, $position)
			->finishedAt($round->battleNr, Carbon::now())
			->store();
	}
}