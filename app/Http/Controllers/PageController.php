<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Fitur;
use App\Models\Cicilan;
use App\Models\PembayaranCicilan;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function home()
    {
        $produk = Produk::all();
        if (auth()->user() != null && Auth::user()->role == 'admin') {
            return redirect('dashboard');
        } elseif (auth()->user() != null && Auth::user()->role == 'user') {
            return view('page.home.index', compact('produk'));
        } else {
            return view('page.home.index', compact('produk'));
        }
    }

    public function produk()
    {
        $produk = Produk::all();
        return view('page.produk.index', compact('produk'));
    }

    public function detail_produk($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $produk =  Produk::find($decryptedId);
        $cicilan = Cicilan::where('produk_id', $decryptedId)->first();
        $fitur =  Fitur::leftJoin('fitur_produk as fp', 'fp.fitur_id', '=', 'fitur.id')
            ->select('fitur.*')
            ->where('fp.produk_id', $decryptedId)->get();
        return view('page.produk.detail', compact('produk', 'fitur', 'cicilan'));
    }

    public function invoice()
    {
        return view('page.invoice.index');
    }

    public function kontak()
    {
        return view('page.kontak.index');
    }

    public function pesanan()
    {
        if (auth()->user() != null) {
            $pemesanan = Pemesanan::where('user_id', Auth::user()->id)->get();
        } else {
            $pemesanan = '';
        }
        return view('page.pesanan.index', compact('pemesanan'));
    }

    public function detail_cicilan($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $cicilan =  PembayaranCicilan::where('pemesanan_id', $decryptedId)->paginate(5);
        return view('page.pesanan.detail', compact('cicilan'));
    }

    public function tentang()
    {
        return view('page.tentang.index');
    }
}
