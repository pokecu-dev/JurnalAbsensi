<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Jurnal\JurnalController;
use App\Livewire\Actions\Logout;

Route::get('/', [LoginController::class, 'Check']);

// Route::view('dashboard', 'dashboard')redirect()->route('login')
// ->middleware(['auth', 'verified'])
// ->name('dashboard');

// Route::view('/login')

Route::get('/login',[LoginController::class,'ShowLoginForm'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::middleware(['auth','verified'])->group(function(){

    // Route::post('')

    // admin
    Route::middleware(['role:admin'])->group(function(){
        // Volt::route('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        Route::view('/admin/dashboard','admin/dashboard')->name('admin.dashboard');
        Route::view('/admin/data_jurnal', 'admin/data_jurnal')->name('admin.data_jurnal');
        Route::view('/admin/data_dispensasi', 'admin.data_dispensasi')->name('admin.data_dispensasi');
        Route::view('/admin/data_dispensasi/{id}', 'admin.detail_dispensasi')->name('admin.detail_dispensasi');
        Route::view('/admin/data_guru', 'admin/data_guru')->name('admin.data_guru');
        Route::view('/admin/data_guru/{id}', 'admin.detail_guru')->name('admin.detail_guru');
        Route::view('/admin/data_siswa', 'admin/data_siswa')->name('admin.data_siswa');
        Route::view('/admin/data_siswa/{id}', 'admin.detail_siswa')->name('admin.detail_siswa');




    });

    Route::middleware(['role:guru'])->group(function () {
        // Volt::route('/guru/dashboard', 'guru.dashboard')->name('guru.dashboard');

        Route::view('/guru/dashboard', 'guru/dashboard')->name('guru.dashboard');
        
        Route::get('/guru/jurnal', [JurnalController::class,'form'])->name('guru.jurnal');
        Route::post('/guru/jurnal/create',[JurnalController::class,'create'])->name('guru.jurnal.create');
        Route::post('/guru/jurnal/create-detail',[JurnalController::class,'AddDetail'])->name('guru.jurnal.detail');
        

        Route::view('/guru/riwayat', 'guru/riwayat')->name('guru.riwayat');
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
