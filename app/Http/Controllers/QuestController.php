<?php

namespace App\Http\Controllers;

use App\Services\BattleListService;
use Illuminate\View\View;

class QuestController extends Controller
{
	public function __construct(
		protected BattleListService $listService
	) { }

	public function index(): View
	{
		return view('quest', [
			'round' => $this->listService->getCurrentRound()
		]);
	}
}