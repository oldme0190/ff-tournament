<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| PUBLIC HOME PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // তোমার FF Tournament Home Page
});

/*
|--------------------------------------------------------------------------
| TOURNAMENTS
|--------------------------------------------------------------------------
*/

Route::get('/tournaments', [TournamentController::class, 'index']);

/*
|--------------------------------------------------------------------------
| AUTH DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard'); // user login dashboard
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| TOURNAMENT ACTIONS (USER)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/tournament/join/{id}', [TournamentController::class, 'join']);
    Route::get('/tournament/result/{id}', [TournamentController::class, 'result']);
    Route::get('/match/live/{id}', [TournamentController::class, 'liveMatch']);

    Route::post('/wallet/deposit', [TournamentController::class, 'deposit']);
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/tournaments/create', [TournamentController::class, 'create']);
    Route::post('/admin/tournaments/store', [TournamentController::class, 'store']);

    Route::get('/admin/result/{id}', [TournamentController::class, 'editResult']);
    Route::post('/admin/result/store', [TournamentController::class, 'storeResult']);
});

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
