<?php

use App\Contracts\RenderableException;
use App\Exceptions\NoRoundsAvailableException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions)
    {
        $exceptions->render(function(RenderableException $exception)
        {
	        return response()->view('errors/204', ['message' => $exception->getMessage()], 404);
        });
    })->create();
