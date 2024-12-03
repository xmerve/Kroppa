<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

/*Route::post('/api/start-game', [GameController::class, 'startGame']);
Route::post('/api/end-game', [GameController::class, 'endGame']);
Route::get('/api/top-ten', [GameController::class, 'topTen']);*/