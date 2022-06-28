<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CardDeckController;
use App\Http\Controllers\DeckController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth', 'prefix' => 'deck', 'as' => 'deck.'], static function () {
    Route::get('', [DeckController::class, 'index'])->name('index');
    Route::get('create', [DeckController::class, 'create'])->name('create');
    Route::post('', [DeckController::class, 'store'])->name('store');
    Route::get('{deck}', [DeckController::class, 'show'])->name('show');
    Route::get('{deck}/edit', [DeckController::class, 'edit'])->name('edit');
    Route::put('{deck}', [DeckController::class, 'update'])->name('update');
    Route::delete('{deck}', [DeckController::class, 'destroy'])->name('destroy');

    Route::group(['prefix' => '{deck}/card', 'as' => 'card.'], static function () {
        Route::get('create', [CardDeckController::class, 'create'])->name('create');
        Route::post('', [CardDeckController::class, 'store'])->name('store');
        Route::delete('{card}', [CardDeckController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['middleware' => 'auth', 'prefix' => 'card', 'as' => 'card.'], static function () {
    Route::get('', [CardController::class, 'index'])->name('index');
    Route::get('create', [CardController::class, 'create'])->name('create');
    Route::post('', [CardController::class, 'store'])->name('store');
    Route::get('{card}', [CardController::class, 'show'])->name('show');
    Route::get('{card}/edit', [CardController::class, 'edit'])->name('edit');
    Route::put('{card}', [CardController::class, 'update'])->name('update');
    Route::delete('{card}', [CardController::class, 'destroy'])->name('destroy');
});
