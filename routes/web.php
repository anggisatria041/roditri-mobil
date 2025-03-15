<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/mobil', [AuthController::class, 'mobil'])->name('mobil');
Route::get('/detailMobil', [AuthController::class, 'detailMobil'])->name('detailMobil');
Route::get('/kontak', [AuthController::class, 'kontak'])->name('kontak');

Route::middleware(['custom-auth'])->group(
    function () {
        // Dashboard
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        });

        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        // Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
