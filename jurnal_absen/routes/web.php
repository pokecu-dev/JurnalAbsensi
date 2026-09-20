<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\Jurnal\JurnalController;

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

    Route::resource('mapels', MapelController::class);

    // Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin/dashboard', 'admin/dashboard')->name('admin.dashboard');
    });

    // Guru
    Route::middleware(['role:guru'])->group(function () {
        Route::view('/guru/dashboard', 'guru/dashboard')->name('guru.dashboard');
        Route::get('/guru/jurnal', [JurnalController::class, 'form'])->name('guru.jurnal');
        Route::post('/guru/jurnal/create', [JurnalController::class, 'create'])->name('guru.jurnal.create');
        Route::post('/guru/jurnal/create-detail', [JurnalController::class, 'AddDetail'])->name('guru.jurnal.detail');
    });

    // Piket
    Route::middleware(['role:piket'])->group(function () {
        Route::view('/piket/dashboard', 'piket/dashboard')->name('piket.dashboard');
    });

    // Sekretaris
    Route::middleware(['role:sekre'])->group(function () {
        Route::view('/sekre/dashboard', 'sekre/dashboard')->name('sekre.dashboard');
    });

});

require __DIR__.'/auth.php';