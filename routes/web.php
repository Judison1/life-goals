<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CardListController;
use App\Http\Controllers\CardController;
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

Route::middleware(['auth:sanctum', 'verified'])
    ->name('dashboard::')
    ->prefix('dashboard')
    ->group(function () {
        Route::resource('boards', BoardController::class);
        Route::resource('card-lists', CardListController::class);
        Route::name('cards.')->prefix('cards')->group(function () {
            Route::get('/{id}/create', [CardController::class, 'create'])->name('create');
            Route::post('/{id}/store', [CardController::class, 'store'])->name('store');
        });

});
