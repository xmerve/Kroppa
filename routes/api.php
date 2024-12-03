<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::post('/start-game', [GameController::class, 'startGame']);
Route::post('/end-game', [GameController::class, 'endGame']);
Route::get('/top-ten', [GameController::class, 'topTen']);