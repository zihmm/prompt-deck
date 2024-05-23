<?php

use App\Http\Controllers\QuestController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestController::class, 'index']);

Route::get('/vote', [VoteController::class, 'index']);
Route::post('/vote', [VoteController::class, 'store'])->name('vote.post');