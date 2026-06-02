<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/tournaments', [TournamentController::class, 'index']);

// JOIN SYSTEM
Route::get('/tournament/join/{id}', [TournamentController::class, 'join'])->middleware('auth');

// RESULT SYSTEM (NEW)
Route::get('/tournament/result/{id}', [TournamentController::class, 'result']);

// ADMIN ROUTES
Route::middleware('auth')->group(function () {

    Route::get('/admin/tournaments/create', [TournamentController::class, 'create']);
    Route::post('/admin/tournaments/store', [TournamentController::class, 'store']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// PROFILE ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/admin/result/{id}', [TournamentController::class, 'editResult']);
    Route::post('/admin/result/store', [TournamentController::class, 'storeResult']);
});

Route::middleware('auth')->group(function () {
    Route::get('/match/live/{id}', [TournamentController::class, 'liveMatch']);
});

Route::post('/wallet/deposit', [TournamentController::class, 'deposit'])->middleware('auth');
