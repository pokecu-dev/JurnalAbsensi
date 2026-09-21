<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sekretaris\JurnalController;
use App\Livewire\Actions\Logout;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Middleware::auth(['auth','verified'])->group()
Route::middleware('auth')->group(function(){

    // admin
    Route::middleware(['role:admin'])->group(function(){
        // Volt::route('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        // Route::view('dashboard','dashboard')->name('admin.dashboard');

    });

    Route::middleware(['role:guru'])->group(function () {
        // Volt::route('/guru/dashboard', 'guru.dashboard')->name('guru.dashboard');
        
    });

    Route::middleware(['role:piket'])->group(function () {
        // Volt::route('/piket/dashboard', 'piket.dashboard')->name('piket.dashboard');
    
    });

    Route::middleware(['role:sekre'])->group(function () {
        Route::view('/sekre/dashboard', 'sekre/dashboard')->name('sekre.dashboard');
        Route::view('/sekre/jadwal', 'sekre/jadwal')->name('sekre.jadwal');
        Route::view('/sekre/jurnal', 'sekre/jurnal')->name('sekre.jurnal.index');
        Route::get('/sekre/jurnal/detail/{jurnal}', [JurnalController::class, 'show'])
            ->name('sekre.jurnal.show');
        Route::post('/sekre/jurnal/{jurnal}/approve', [JurnalController::class, 'approve'])
            ->name('sekre.jurnal.approve');
        Route::post('/sekre/jurnal/{jurnal}/reject', [JurnalController::class, 'reject'])
            ->name('sekre.jurnal.reject');

        Route::get('/sekre/status-validasi', [JurnalController::class, 'index'])
            ->name('sekre.status-validasi');
    });

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
