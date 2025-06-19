<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pemesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Produk::count();
        $pesanan = Pemesanan::count();
        $pesanan_kredit = Pemesanan::where('jenis_pembayaran', 'Kredit')->count();
        $pesanan_tunai = Pemesanan::where('jenis_pembayaran', 'Tunai')->count();
        return view('content.dashboard.index', compact('produk', 'pesanan', 'pesanan_kredit', 'pesanan_tunai'));
    }
}
