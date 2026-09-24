<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Jurnal\JurnalController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Sekretaris\JurnalController as sekreJurnal;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[LoginController::class,'login']);

Route::post('/user/create',[UserController::class,'create']);

Route::get('/user/get',[UserController::class,'GetAllUsers']);

Route::delete('/user/{user}', [UserController::class, 'delete'])->name('user.destroy');

// Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('/jurnal/get',[JurnalController::class,'index']);

Route::post('/jurnal/create',[JurnalController::class, 'Create']);

Route::post('/jurnal/add-siswa',[JurnalController::class, 'AddDetails']);

Route::delete('/jurnal/delete-jurnal/{jurnal}',[JurnalController::class,'deleteJurnal']);

Route::delete('/jurnal/delete-detail/{detailJurnal}',[JurnalController::class,'deleteDetail']);

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
});


Route::get('/sekre/jurnal/show/{jurnal}',[sekreJurnal::class,'show']);