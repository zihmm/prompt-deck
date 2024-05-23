<?php

namespace App\Services;

use App\Entities\Round;
use App\Enums\ActorPositionEnum;
use App\Exceptions\NoRoundsAvailableException;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;

class BattleListService
{
	protected Spreadsheet|null $spreadsheet = null;
	protected Worksheet|null $worksheet = null;

	private string $filepath;

	public function __construct(Xlsx $xlsReader)
	{
		$this->filepath = storage_path('/app/public/battles.xlsx');

		$this->spreadsheet = $xlsReader->load($this->filepath);
		$this->worksheet = $this->spreadsheet->getActiveSheet();
	}

	public function getCurrentRound(): Round
	{
		$data = Arr::take(
			$this->worksheet->toArray(),
			-($this->worksheet->getHighestRow() - 1)
		);

		$round = Arr::first($data, fn($value, int $key) => empty($value[5]));

		if ( ! $round)
		{
			throw new NoRoundsAvailableException(__('no_more_rounds_available'));
		}

		return new Round(
			roundNr: $round[0],
			battleNr: $round[1],
			prompt: $round[2],
			actorLeft: $round[3],
			actorRight: $round[4],
			isFinal: $this->worksheet->getHighestRow() - 1 == $round[1]
		);
	}

	public function setWinner(Round $round, ActorPositionEnum $winner): void
	{
		$this->worksheet->getStyle([$winner->value, $round->battleNr + 1])->getFont()->setBold(true);
		$this->worksheet->setCellValue([6, $round->battleNr + 1], Carbon::now());

		(new Writer($this->spreadsheet))->save($this->filepath);
	}
}