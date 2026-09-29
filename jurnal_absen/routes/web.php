<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JadwalPiketController;
use App\Http\Controllers\Jurnal\JurnalController;
use App\Http\Controllers\Sekretaris\JurnalController as SekreJurnal;
use App\Http\Controllers\MapelController;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'Check'])->name('/');

// Guest Routes (Login)
Route::get('/login', [LoginController::class, 'ShowLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

Route::get('/login', [LoginController::class, 'ShowLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/jadwal-piket/check', [JadwalPiketController::class, 'check'])
        ->name('jadwal-piket.check');

    // Route::post('')

    // admin
    Route::middleware(['role:admin'])->group(function () {
        // Volt::route('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
        // route::get('/admin/dashboard', function () {
        //     return view('')
        // })
        Route::view('/admin/dashboard', 'admin/dashboard')->name('admin.dashboard');
        Route::view('/admin/data_jurnal', 'admin/data_jurnal')->name('admin.data_jurnal');
        Route::view('/admin/data_dispensasi', 'admin.data_dispensasi')->name('admin.data_dispensasi');
        Route::view('/admin/data_dispensasi/{id}', 'admin.detail_dispensasi')->name('admin.detail_dispensasi');
        Route::view('/admin/data_guru', 'admin/data_guru')->name('admin.data_guru');
        Route::view('/admin/data_guru/{id}', 'admin.detail_guru')->name('admin.detail_guru');
        Route::view('/admin/data_siswa', 'admin/data_siswa')->name('admin.data_siswa');
        Route::view('/admin/data_siswa/{id}', 'admin.detail_siswa')->name('admin.detail_siswa');
        Route::resource('admin/data_mapel', MapelController::class)->names('admin.data_mapel');
        Route::resource('mapels', MapelController::class);
    });
   

    });

    Route::middleware(['role:guru'])->group(function () {

        Route::get('/guru/dashboard', function () {
            $jadwal = Jadwal::GetJadwalBy(auth()->id(), 1, ['teacher', 'classes', 'mapel']);

            return view('guru.dashboard', compact(['jadwal']));
        })->name('guru.dashboard');
        // Route::view('/guru/dashboard','guru/dashboard')->name('guru.dashboard');

        Route::get('/guru/jurnal', [JurnalController::class, 'form']);
        // route::get('/guru/jurnal', function () {
        //     $jadwal = Jadwal::GetJadwalBy(auth()->id(), 1, ['teacher', 'classes', 'mapel']);

        //     return view('guru.jurnal',compact(['jadwal']));
        // });

        // Route::get('/guru/jurnal', [JurnalController::class,'form'])->name('guru.jurnal');
        Route::post('/guru/jurnal/create', [JurnalController::class, 'create'])->name('guru.jurnal.create');
        // Route::post('/guru/jurnal/create-detail',[JurnalController::class,'AddDetail'])->name('guru.jurnal.detail');

        Route::view('/guru/riwayat', 'guru/riwayat')->name('guru.riwayat');
    });

    Route::middleware(['role:piket,guru','route:piket'])->group(function () {
        Route::view('/piket/dashboard', 'piket/dashboard')->name('piket.dashboard');
        // Volt::route('/piket/dashboard', 'piket.dashboard')->name('piket.dashboard');

    });

    Route::middleware(['role:sekre'])->group(function () {
        Route::view('/sekre/dashboard', 'sekre/dashboard')->name('sekre.dashboard');
        // Volt::route('/sekre/dashboard', 'sekre.dashboard')->name('sekre.dashboard');

        Route::view('/sekre/dashboard', 'sekre/dashboard')->name('sekre.dashboard');
        Route::view('/sekre/jadwal', 'sekre/jadwal')->name('sekre.jadwal');
        Route::view('/sekre/jurnal', 'sekre/jurnal')->name('sekre.jurnal.index');
        Route::get('/sekre/jurnal/detail/{jurnal}', [SekreJurnal::class, 'show'])
            ->name('sekre.jurnal.show');
        Route::post('/sekre/jurnal/{jurnal}/approve', [SekreJurnal::class, 'approve'])
            ->name('sekre.jurnal.approve');
        Route::post('/sekre/jurnal/{jurnal}/reject', [SekreJurnal::class, 'reject'])
            ->name('sekre.jurnal.reject');

        Route::get('/sekre/status-validasi', [SekreJurnal::class, 'index'])
            ->name('sekre.status-validasi');
    });

});



require __DIR__.'/auth.php';