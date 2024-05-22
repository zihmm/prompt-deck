<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('svg', function(string $path)
        {
	        $svg = new \DOMDocument();
	        $svg->load(
		        public_path(str_replace("'", '', $path))
	        );

	        return $svg->saveXML($svg->documentElement);
        });
    }
}
