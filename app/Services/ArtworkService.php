<?php

namespace App\Services;

use App\Enums\ActorPosition;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\EncodedImage;
use Intervention\Image\Image;
use Intervention\Image\Laravel\Facades\Image as ImageFacade;

class ArtworkService
{
	public function __construct(
		protected RoundService $roundService
	) { }

	public function render(ActorPosition $positionEnum): ?EncodedImage
	{
		if (($artwork = $this->getFile($positionEnum)))
		{
			return $artwork->encode();
		}

		return null;
	}

	protected function getFile(ActorPosition $position): ?Image
	{
		$files = Storage::disk('dropbox')->files(sprintf("%s/%s/",
			$position->value,
			$this->roundService->current()->getName()
		));

		$artworks = array_filter($files, fn($file) => pathinfo($file, PATHINFO_EXTENSION) === 'webp');

		// No file found
		if (count($artworks) === 0)
		{
			return null;
		}

		return ImageFacade::read(
			Storage::disk('dropbox')->readStream($artworks[0])
		)->cover(
			width: 1024,
			height: 1024
		);
	}
}