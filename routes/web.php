<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiturController;

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/mobil', [AuthController::class, 'mobil'])->name('mobil');
Route::get('/detailMobil', [AuthController::class, 'detailMobil'])->name('detailMobil');
Route::get('/pesanan', [AuthController::class, 'pesanan'])->name('pesanan');
Route::get('/tentang', [AuthController::class, 'tentang'])->name('tentang');
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

        // User
        Route::prefix('fitur')->group(function () {
            Route::get('/', [FiturController::class, 'index'])->name('fitur.index');
            Route::post('/store', [FiturController::class, 'store'])->name('fitur.store');
            Route::get('/edit/{id}', [FiturController::class, 'edit'])->name('fitur.edit');
            Route::post('/update', [FiturController::class, 'update'])->name('fitur.update');
            Route::delete('/{id}', [FiturController::class, 'destroy'])->name('fitur.destroy');
        });

        // Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
