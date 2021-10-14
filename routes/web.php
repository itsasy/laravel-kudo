<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/boards', \App\Http\Controllers\BoardController::class);
Route::resource('/publications', \App\Http\Controllers\PublicationController::class)->except(['index', 'show']);
Route::get('/board-publications/{board}', [\App\Http\Controllers\PublicationController::class, 'show'])->name('board.publications');
