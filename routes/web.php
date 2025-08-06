<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiturController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\VerifikasiStatus;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\TunggakanController;

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
    Route::get('/detail_cicilan/{id}', [PageController::class, 'detail_cicilan'])->name('detail_cicilan');

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

        // Pemesanan
        Route::prefix('pemesanan')->group(function () {
            Route::get('/', [PemesananController::class, 'index'])->name('pemesanan.index');
            Route::post('/store', [PemesananController::class, 'store'])->name('pemesanan.store');
            Route::get('/edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
            Route::post('/update', [PemesananController::class, 'update'])->name('pemesanan.update');
            Route::delete('/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
            Route::get('/show/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
            Route::post('/bukti_pembayaran', [PemesananController::class, 'bukti_pembayaran'])->name('pemesanan.bukti_pembayaran');
            Route::post('/pembayaran_cicilan', [PemesananController::class, 'pembayaran_cicilan'])->name('pemesanan.pembayaran_cicilan');
            Route::get('/kwitansi/{id}', [PemesananController::class, 'kwitansi'])->name('pemesanan.kwitansi');
        });

        // Laporan Penjualan
        Route::prefix('tunggakan')->group(function () {
            Route::get('/', [TunggakanController::class, 'index'])->name('tunggakan.index');
            Route::post('/data', [TunggakanController::class, 'data'])->name('tunggakan-list');
        });

        // Laporan Penjualan
        Route::prefix('laporan_penjualan')->group(function () {
            Route::get('/', [LaporanPenjualanController::class, 'index'])->name('laporan_penjualan.index');
            Route::post('/data', [LaporanPenjualanController::class, 'data'])->name('laporan_penjualan-list');
        });

        // Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        // Verifikasi Status
        Route::post('verifikasi-status', VerifikasiStatus::class);
    }
);
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

