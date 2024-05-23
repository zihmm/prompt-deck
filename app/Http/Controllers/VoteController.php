<?php

namespace App\Http\Controllers;

use App\Enums\ActorPositionEnum;
use App\Services\BattleListService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VoteController extends Controller
{
	public function __construct(
		protected Request $request,
		protected BattleListService $listService
	) { }

	public function index(): View
	{
		return view('vote', [
			'round' => $this->listService->getCurrentRound()
		]);
	}

	public function store(): array
	{
		$this->listService->setWinner(
			$this->listService->getCurrentRound(),
			ActorPositionEnum::{ucfirst($this->request->get('position'))}
		);

		return [
			'notification' => __('thank_you')
		];
	}
}