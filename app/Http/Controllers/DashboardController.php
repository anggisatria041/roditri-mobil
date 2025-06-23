<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = Produk::count();
        $pesanan = Pemesanan::count();
        $pesanan_kredit = Pemesanan::where('jenis_pembayaran', 'Kredit')->count();
        $pesanan_tunai = Pemesanan::where('jenis_pembayaran', 'Tunai')->count();

        // Ambil data jumlah pemesanan per bulan
        $pemesanan_bulan = Pemesanan::select(
            DB::raw('MONTH(tanggal) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy(DB::raw('MONTH(tanggal)'))
            ->orderBy(DB::raw('MONTH(tanggal)'))
            ->get()
            ->pluck('total', 'bulan') // format: [bulan => total]
            ->toArray();

        // Siapkan 12 bulan
        $jumlah = [];
        $bulan = [];

        for ($i = 1; $i <= 12; $i++) {
            $jumlah[] = $pemesanan_bulan[$i] ?? 0; // jika tidak ada data, isi 0
            $bulan[] = date('F', mktime(0, 0, 0, $i, 10)); // ubah jadi nama bulan
        }
        return view('content.dashboard.index', compact('produk', 'pesanan', 'pesanan_kredit', 'pesanan_tunai', 'jumlah', 'bulan'));
    }
}
