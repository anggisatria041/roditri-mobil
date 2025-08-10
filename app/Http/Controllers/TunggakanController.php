<?php

namespace App\Http\Controllers;

use App\Models\PembayaranCicilan;
use Carbon\Carbon;

class TunggakanController extends Controller
{
 // Fungsi index akan digunakan untuk menampilkan daftar pembayaran cicilan yang berstatus pending
public function index()
{
    // Mengambil data dari tabel pembayaran cicilan yang statusnya 'pending'
    // dan tanggal jatuh temponya kurang dari atau sama dengan hari ini (tunggakan)
    $data = PembayaranCicilan::where('status', 'pending')
        ->whereDate('tanggal_jatuh_tempo', '<=', Carbon::today())
        ->paginate(10); // Data hasil query dipaginasi, 10 data per halaman

    // Mengirim data tersebut ke view 'content.tunggakan.list' dengan variabel 'data'
    return view('content.tunggakan.list', compact('data'));
}
}
