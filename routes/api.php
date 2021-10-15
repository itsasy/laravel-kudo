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

Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('name');
Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
Route::post('refresh', [\App\Http\Controllers\Auth\AuthController::class, 'refresh'])->name('refresh');
Route::post('me', [\App\Http\Controllers\Auth\AuthController::class, 'me'])->name('me');
Route::resource('/boards', \App\Http\Controllers\BoardController::class);
Route::resource('/publications', \App\Http\Controllers\PublicationController::class)->except(['index', 'show']);
Route::get('/board-publications/{board}', [\App\Http\Controllers\PublicationController::class, 'show'])->name('board.publications');
Route::resource('/workers', \App\Http\Controllers\WorkerController::class)->only(['index']);
