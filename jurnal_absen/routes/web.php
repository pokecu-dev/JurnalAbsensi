<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


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
        // Volt::route('/sekre/dashboard', 'sekre.dashboard')->name('sekre.dashboard');
       
    });

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
