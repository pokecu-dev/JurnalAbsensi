<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Models\Jadwal;
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
x
Route::middleware(['auth','verified'])->group(function(){

    // Route::post('')

    // admin
    Route::middleware(['role:admin'])->group(function(){
        // Volt::route('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        // route::get('/admin/dashboard', function () {
        //     return view('')
        // })
        Route::view('/admin/dashboard','admin/dashboard')->name('admin.dashboard');

    });

    Route::middleware(['role:guru'])->group(function () {
        
        route::get('/guru/dashboard', function () {
            $jadwal = Jadwal::GetJadwalBy(auth()->id(), 1, ['teacher', 'classes', 'mapel']);

            return view('guru.dashboard',compact(['jadwal']));
        })->name('guru.dashboard');
        // Route::view('/guru/dashboard','guru/dashboard')->name('guru.dashboard');

        route::get('/guru/jurnal', function () {
            $jadwal = Jadwal::GetJadwalBy(auth()->id(), 1, ['teacher', 'classes', 'mapel']);

            return view('guru.jurnal',compact(['jadwal']));
        });
        
        // Route::get('/guru/jurnal', [JurnalController::class,'form'])->name('guru.jurnal');
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
