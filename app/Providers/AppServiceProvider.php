<?php

namespace App\Providers;

use App\Contracts\Repository as RepositoryContract;
use App\Repositories\ExcelRepository;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
	    App::bind(RepositoryContract::class, ExcelRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
	    Storage::extend('dropbox', function (Application $app, array $config)
        {
			$adapter = new DropboxAdapter(new  Client(
				$config['token']
			));

			return new FilesystemAdapter(
				new Filesystem($adapter, $config),
				$adapter,
				$config
			);
        });
    }
}
