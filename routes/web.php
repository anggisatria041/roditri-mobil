<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');

// Page All
Route::prefix('roditri-mobil')->group(function () {

    // Home
    Route::get('/home', [PageController::class, 'home'])->name('home');

    // Tentang
    Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');

    // Produk
    Route::get('/produk', [PageController::class, 'produk'])->name('produk');
    Route::get('/detail_produk/{id}', [PageController::class, 'detail_produk'])->name('detail-produk');

    // Pesanan
    Route::get('/pesanan', [PageController::class, 'pesanan'])->name('pesanan');

    // Kontak
    Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

    //Invoice
    Route::get('/invoice', [PageController::class, 'invoice'])->name('invoice');
});

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

        // Fitur
        Route::prefix('fitur')->group(function () {
            Route::get('/', [FiturController::class, 'index'])->name('fitur.index');
            Route::post('/store', [FiturController::class, 'store'])->name('fitur.store');
            Route::get('/edit/{id}', [FiturController::class, 'edit'])->name('fitur.edit');
            Route::post('/update', [FiturController::class, 'update'])->name('fitur.update');
            Route::delete('/{id}', [FiturController::class, 'destroy'])->name('fitur.destroy');
        });

        // Produk
        Route::prefix('produk')->group(function () {
            Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
            Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
            Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
            Route::post('/update', [ProdukController::class, 'update'])->name('produk.update');
            Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
            Route::get('/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
        });

        // Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
