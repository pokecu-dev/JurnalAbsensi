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
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::view('dashboard', 'dashboard')
        ->middleware(['verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

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
        Route::resource('admin/data_mapel', MapelController::class)->names('admin.data_mapel');
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