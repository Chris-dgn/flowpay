<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DepositController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'locale'])->name('dashboard');

Route::middleware(['auth', 'locale'])->group(function () {
    Route::get('/transfert', [TransferController::class, 'create'])->name('transfers.create');

    Route::get(
    '/transfert/verification',
    [TransferController::class, 'verification']
)->name('transfers.verification');

Route::post('/transfert/verification', [TransferController::class, 'verify'])
    ->name('transfers.verify');
Route::get('/transfert/succes', function () {
    return view('transfers.success');
})->name('transfers.success');

Route::get('/transfert/niveau-chargement', [TransferController::class, 'loadingLevel'])
    ->name('transfers.loading-level');

        Route::get('/carte', [CardController::class, 'show'])->name('card.show');
        Route::get('/ajouter', [DepositController::class, 'create'])->name('deposits.create');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/transfert', [TransferController::class, 'store'])->name('transfers.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'create'])
        ->name('admin.login');

    Route::post('/login', [AdminLoginController::class, 'store'])
        ->name('admin.login.store')
        ->middleware('throttle:5,1');

    Route::post('/logout', [AdminLoginController::class, 'destroy'])
        ->name('admin.logout')
        ->middleware('auth');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/users/{user}', [AdminDashboardController::class, 'show'])
        ->name('admin.users.show');

        Route::patch('/users/{user}/loading-level', [AdminDashboardController::class, 'updateLoadingLevel'])
    ->name('admin.users.loading-level.update');

    Route::patch('/users/{user}/balance', [AdminDashboardController::class, 'updateBalance'])
    ->name('admin.users.balance.update');
});
require __DIR__.'/auth.php';

