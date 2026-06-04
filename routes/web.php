<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ProfileController;

// HOME PAGE
Route::get('/', function () {
    return view('dashboard');
});

// TOURNAMENTS
Route::get('/tournaments', [TournamentController::class, 'index']);

// JOIN TOURNAMENT
Route::get('/tournament/join/{id}', [TournamentController::class, 'join'])
    ->middleware('auth');

// TOURNAMENT RESULT
Route::get('/tournament/result/{id}', [TournamentController::class, 'result']);

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// PROFILE
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// ADMIN TOURNAMENT
Route::middleware('auth')->group(function () {

    Route::get('/admin/tournaments/create',
        [TournamentController::class, 'create']);

    Route::post('/admin/tournaments/store',
        [TournamentController::class, 'store']);
});

// ADMIN RESULT
Route::middleware('auth')->group(function () {

    Route::get('/admin/result/{id}',
        [TournamentController::class, 'editResult']);

    Route::post('/admin/result/store',
        [TournamentController::class, 'storeResult']);
});

// LIVE MATCH
Route::middleware('auth')->group(function () {

    Route::get('/match/live/{id}',
        [TournamentController::class, 'liveMatch']);
});

// WALLET
Route::post('/wallet/deposit',
    [TournamentController::class, 'deposit'])
    ->middleware('auth');

require __DIR__.'/auth.php';
