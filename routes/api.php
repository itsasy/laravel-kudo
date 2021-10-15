<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('/boards', \App\Http\Controllers\BoardController::class);
Route::resource('/publications', \App\Http\Controllers\PublicationController::class)->except(['index', 'show']);
Route::get('/board-publications/{board}', [\App\Http\Controllers\PublicationController::class, 'show'])->name('board.publications');
Route::resource('/workers', \App\Http\Controllers\WorkerController::class)->only(['index']);
