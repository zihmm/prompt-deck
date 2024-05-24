<?php

namespace App\Repositories;

use App\Contracts\Repository as Contract;
use App\Entities\Round;
use App\Enums\ActorPositionEnum;
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
			config('battle.xls.filepath')
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
			fn($value, int $key) => empty($value[config('battle.xls.index.finished_at')])
		);

		if ( ! $current)
		{
			return null;
		}

		return new Round(
			roundNr: $current[0],
			battleNr: $current[1],
			prompt: $current[2],
			actorLeft: $current[3],
			actorRight: $current[4],
			isFinal: $this->worksheet->getHighestRow() - 1 == $current[1]
		);
	}

	public function store(): void
	{
		(new XlsWriter($this->spreadsheet))->save(
			config('battle.xls.filepath')
		);
	}

	public function flagWinner( int $battleNr, ActorPositionEnum $position ): Contract
	{
		$cell = match($position)
		{
			ActorPositionEnum::Left => config('battle.xls.cells.actor_left'),
			ActorPositionEnum::Right => config('battle.xls.cells.actor_right')
		};

		$this->worksheet->getStyle([$cell, ($battleNr + 1)])->getFont()->setBold(true);

		return $this;
	}

	public function finishedAt( int $battleNr, Carbon $date): Contract
	{
		$this->worksheet->setCellValue(
			[config('battle.xls.cells.finished_at'), ($battleNr + 1)],
			$date
		);

		return $this;
	}

	public function roundsCount(): int
	{
		return $this->worksheet->getHighestRow() - 1;
	}

}