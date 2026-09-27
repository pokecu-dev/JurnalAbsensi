<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Jurnal\JurnalController;
use App\Http\Controllers\JadwalController;
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

        Route::resource('jadwal', JadwalController::class);
    });

    Route::middleware(['role:guru'])->group(function () {
        // Volt::route('/guru/dashboard', 'guru.dashboard')->name('guru.dashboard');
        Route::view('/guru/dashboard','guru/dashboard')->name('guru.dashboard');
        Route::get('/guru/jurnal', [JurnalController::class,'form'])->name('guru.jurnal');
        Route::post('/guru/jurnal/create',[JurnalController::class,'create'])->name('guru.jurnal.create');
        Route::post('/guru/jurnal/create-detail',[JurnalController::class,'AddDetail'])->name('guru.jurnal.detail');
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

// Rute Bantuan untuk membuat akun secara otomatis dari browser
Route::get('/buat-akun-admin', function () {
    \App\Models\User::updateOrCreate(
        ['email' => 'jadwal@ex.com'],
        [
            'name' => 'Admin Jadwal',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
            'nip' => '123456789012345678',
            'nuptk' => '1234567890123456',
            'phone' => '081234567890'
        ]
    );
    return 'Akun jadwal@ex.com dengan password "password" BERHASIL DIBUAT! <br><br> <a href="/login">Klik di sini untuk Login</a>';
});
