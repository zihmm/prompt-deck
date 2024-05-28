<?php

namespace App\Repositories;

use App\Contracts\Repository as Contract;
use App\Entities\Round;
use App\Enums\ActorPosition;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsWriter;

class ExcelRepository extends Repository implements Contract
{
	protected Spreadsheet $spreadsheet;
	protected Worksheet $worksheet;

	public function __construct()
	{
		$this->spreadsheet = (new XlsReader)->load(
			config('promptdeck.xls.filepath')
		);

		$this->worksheet = $this->spreadsheet->getActiveSheet();
	}

	public function all(): Collection
	{
		return collect(Arr::take(
			$this->worksheet->toArray(),
			-$this->roundsCount()
		));
	}

	public function getCurrentRound(): ?Round
	{
		$current = Arr::first(
			$this->all()->toArray(),
			fn($value, int $key) => empty($value[config('promptdeck.xls.index.finished_at')])
		);

		if ( ! $current)
		{
			return null;
		}

		return new Round(
			roundNr: $current[0],
			battleNr: $current[1],
			prompt: $current[2],
			actorWhite: $current[3],
			actorRed: $current[4],
			isFinal: $this->worksheet->getHighestRow() - 1 == $current[1]
		);
	}

	public function store(): void
	{
		(new XlsWriter($this->spreadsheet))->save(
			config('promptdeck.xls.filepath')
		);
	}

	public function flagWinner( int $battleNr, ActorPosition $position ): Contract
	{
		$cell = match($position)
		{
			ActorPosition::White => config('promptdeck.xls.cells.actor_white'),
			ActorPosition::Red => config('promptdeck.xls.cells.actor_red')
		};

		$this->worksheet->getStyle([$cell, ($battleNr + 1)])->getFont()->setBold(true);

		return $this;
	}

	public function finishedAt( int $battleNr, Carbon $date): Contract
	{
		$this->worksheet->setCellValue(
			[config('promptdeck.xls.cells.finished_at'), ($battleNr + 1)],
			$date
		);

		return $this;
	}

	public function roundsCount(): int
	{
		return $this->worksheet->getHighestRow() - 1;
	}

}