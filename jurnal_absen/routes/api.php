<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/login',[LoginController::class,'login']);

Route::post('/user/create',[UserController::class,'create']);

Route::get('/user/get',[UserController::class,'GetAllUsers']);

Route::delete('/user/{user}', [UserController::class, 'delete'])->name('user.destroy');

// Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user/update/{user}', [UserController::class, 'update'])->name('user.update');
});