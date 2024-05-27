<?php

namespace App\Http\Controllers;

use App\Enums\ActorPositionEnum;
use App\Services\ArtworkService;
use App\Services\RoundService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VoteController extends Controller
{
	public function __construct(
		protected Request $request,
		protected RoundService $roundService,
		protected ArtworkService $artworkService
	) { }

	public function index(): View
	{
		return view('vote', [
			'round' => $this->roundService->current(),
			'artworks' => [
				ActorPositionEnum::Left->value => $this->artworkService->render(ActorPositionEnum::Left),
				ActorPositionEnum::Right->value => $this->artworkService->render(ActorPositionEnum::Right)
			]
		]);
	}

	public function store(): array
	{
		$position = ActorPositionEnum::{ucfirst($this->request->get('position'))};

		$this->roundService->finish(
			round: $this->roundService->current(),
			position: $position
		);

		return [
			'notification' => __('thank_you')
		];
	}
}