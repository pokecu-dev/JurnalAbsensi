<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Actions\Logout;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::view('/login')

Route::get('/login',[LoginController::class,'ShowLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login']);
// Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


// Middleware::auth(['auth','verified'])->group()
Route::middleware('auth')->group(function(){

    // admin
    Route::middleware(['role:admin'])->group(function(){
        // Volt::route('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        Route::view('/admin/dashboard','admin/dashboard')->name('admin.dashboard');

    });

    Route::middleware(['role:guru'])->group(function () {
        // Volt::route('/guru/dashboard', 'guru.dashboard')->name('guru.dashboard');
        Route::view('/guru/dashboard','guru/dashboard')->name('guru.dashboard');
        
    });

    Route::middleware(['role:piket'])->group(function () {
        Route::view('/piket/dashboard','piket/dashboard')->name('piket.dashboard');
        // Volt::route('/piket/dashboard', 'piket.dashboard')->name('piket.dashboard');
    
    });

    Route::middleware(['role:sekre'])->group(function () {
        Route::view('/sekre/dashboard','sekre/dashboard')->name('sekre.dashboard');
        // Volt::route('/sekre/dashboard', 'sekre.dashboard')->name('sekre.dashboard');
       
    });

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
