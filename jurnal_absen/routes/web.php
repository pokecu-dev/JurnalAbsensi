<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JadwalPiketController;
use App\Http\Controllers\Jurnal\DispenApprovalController;
use App\Http\Controllers\Jurnal\DispenController;
use App\Http\Controllers\Jurnal\JurnalController;
use App\Http\Controllers\Sekretaris\JurnalController as SekreJurnal;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JadwalController;

Route::get('/', [LoginController::class, 'Check'])->name('/');

// Route::view('dashboard', 'dashboard')redirect()->route('login')
// ->middleware(['auth', 'verified'])
// ->name('dashboard');

// Route::view('/login')

Route::get('/login', [LoginController::class, 'ShowLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/test-dispen', function () {
//     return view('test-dispen');
// });

Route::get('/test-dispen', [DispenController::class, 'create']);

Route::post('/dispen', [DispenController::class, 'store'])
    ->name('dispen.store');

Route::get('/dispen/approval/{dispen}/{token}', [
    DispenApprovalController::class,
    'approval',
])->name('dispen.approval');

Route::post('/dispen/approval/{dispen}/{token}/resend', [
    DispenApprovalController::class,
    'resend',
])->name('dispen.approval.resend');

Route::post('/dispen/approval/{dispen}/login', [
    DispenApprovalController::class,
    'login',
])->name('dispen.approval.login');

Route::middleware('auth')->get('/dispen/{dispen}/approval', [
    DispenApprovalController::class,
    'approvalPage',
])->name('dispen.approval.page');

Route::middleware('auth')->post('/dispen/{dispen}/status', [
    DispenApprovalController::class,
    'updateStatus',
])->name('dispen.status');

Route::get('/dispen/{dispen}', [
    DispenController::class,
    'show',
])->name('dispen.show');

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
Route::view('/admin/data_kelas', 'admin.data_kelas')->name('admin.data_kelas');
Route::view('/admin/jadwal', 'admin.jadwal')->name('admin.jadwal');
Route::view('/admin/akun', 'admin.akun')->name('admin.akun');
    });

    Route::middleware(['role:guru'])->group(function () {
        Route::get('/guru/dashboard', function () {
            $jadwal = Jadwal::GetJadwalBy(
                auth()->id(),
                1,
                ['teacher', 'classes', 'mapel']
            );

            return view(
                'guru.dashboard',
                compact(['jadwal'])
            );
        })->name('guru.dashboard');

        Route::get(
            '/guru/jurnal',
            [JurnalController::class, 'form']
        )->name('guru.jurnal');

        Route::post(
            '/guru/jurnal/create',
            [JurnalController::class, 'create']
        )->name('guru.jurnal.create');

        Route::post(
            '/guru/jurnal/create-detail',
            [JurnalController::class, 'AddDetail']
        )->name('guru.jurnal.detail');

        Route::view(
            '/guru/akun',
            'guru/akun'
        )->name('guru.akun');

    });

    Route::middleware(['role:piket,guru'])->group(function () {
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
//             'nuptk' => '1234567890123456',
            'phone' => '081234567890'
        ]
    );
    return 'Akun jadwal@ex.com dengan password "password" BERHASIL DIBUAT! <br><br> <a href="/login">Klik di sini untuk Login</a>';
});
