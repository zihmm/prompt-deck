<?php

namespace App\Http\Controllers;

use App\Services\BattleListService;
use App\Services\RoundService;
use Illuminate\View\View;

class QuestController extends Controller
{
	public function __construct(
		protected RoundService $roundService
	) { }

	public function index(): View
	{
		return view('quest', [
			'round' => $this->roundService->current()
		]);
	}
}