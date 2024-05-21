<?php

use App\Http\Controllers\RoundsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoundsController::class, 'index']);