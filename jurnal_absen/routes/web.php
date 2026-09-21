<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\Jurnal\JurnalController;

Route::resource('mapels', MapelController::class);
Route::get('/', [LoginController::class, 'Check']);

// Guest Routes (Login)
Route::get('/login', [LoginController::class, 'ShowLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    // Admin Group
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin/dashboard')->name('dashboard');  
        Route::resource('mapels', MapelController::class);               
    });

    // Guru Group
    Route::middleware(['role:guru'])->prefix('guru')->name('guru.')->group(function () {
        Route::view('/dashboard', 'guru/dashboard')->name('dashboard');  // Route: guru.dashboard
        Route::get('/jurnal', [JurnalController::class, 'form'])->name('jurnal');
        Route::post('/jurnal/create', [JurnalController::class, 'create'])->name('jurnal.create');
        Route::post('/jurnal/create-detail', [JurnalController::class, 'AddDetail'])->name('jurnal.detail');
    });

    // Piket Group
    Route::middleware(['role:piket'])->prefix('piket')->name('piket.')->group(function () {
        Route::view('/dashboard', 'piket/dashboard')->name('dashboard');  // Route: piket.dashboard
    });

    // Sekretaris Group
    Route::middleware(['role:sekre'])->prefix('sekre')->name('sekre.')->group(function () {
        Route::view('/dashboard', 'sekre/dashboard')->name('dashboard');  // Route: sekre.dashboard
    });

});

require __DIR__.'/auth.php';