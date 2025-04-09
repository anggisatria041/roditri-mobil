<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

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
        return view('page.produk.index');
    }

    public function detail_produk()
    {
        return view('page.produk.detail');
    }

    public function kontak()
    {
        return view('page.kontak.index');
    }

    public function pesanan()
    {
        return view('page.pesanan.index');
    }

    public function tentang()
    {
        return view('page.tentang.index');
    }
}
