<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// LOGIN
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'prosesLogin']);
// REGISTER
Route::get('/daftar', [LoginController::class, 'daftar']);
Route::post('/daftar', [LoginController::class, 'prosesDaftar']);
// LOGOUT
Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware(['isAuth'])->group(function () {
    // User
    Route::middleware(['admin'])->group(function () {
        Route::get('/welcome', [ViewController::class, 'index']);
    });

    // Admin
    Route::middleware(['user'])->group(function () {
        Route::get('/dashboard', [ViewController::class, 'dashboard']);
    });
});
