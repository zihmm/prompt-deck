<?php

namespace App\Http\Controllers;

use App\Enums\ActorPositionEnum;
use App\Services\RoundService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VoteController extends Controller
{
	public function __construct(
		protected Request $request,
		protected RoundService $roundService
	) { }

	public function index(): View
	{
		return view('vote', [
			'round' => $this->roundService->current()
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