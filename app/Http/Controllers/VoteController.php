<?php

namespace App\Http\Controllers;

use App\Enums\ActorPosition;
use App\Services\ArtworkService;
use App\Services\PromptService;
use App\Services\RoundService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VoteController extends Controller
{
	public function __construct(
		protected Request $request,
		protected RoundService $roundService,
		protected ArtworkService $artworkService,
		protected PromptService $promptService
	) { }

	public function index(): View
	{
		return view('vote', [
			'round' => $this->roundService->current(),
			'artworks' => [
				ActorPosition::White->value  => $this->artworkService->render(ActorPosition::White),
				ActorPosition::Red->value => $this->artworkService->render(ActorPosition::Red)
			],
			'prompts' => [
				ActorPosition::White->value => $this->promptService->display(ActorPosition::White),
				ActorPosition::Red->value => $this->promptService->display(ActorPosition::Red),
			]
		]);
	}

	public function store(): array
	{
		$position = ActorPosition::{ucfirst($this->request->get('position'))};

		$this->roundService->finish(
			round: $this->roundService->current(),
			position: $position
		);

		return [
			'notification' => __('thank_you')
		];
	}
}