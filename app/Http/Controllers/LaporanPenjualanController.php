<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Produk;
use Yajra\DataTables\Facades\DataTables;
use DateTime;

class LaporanPenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('content.laporan_penjualan.index', compact('produk'));
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = Pemesanan::selectRaw('YEAR(tanggal) as tahun, MONTH(tanggal) as bulan, produk_id, COUNT(*) as jumlah')
                ->with('produk')
                ->groupBy('tahun', 'bulan', 'produk_id')
                ->orderBy('tahun', 'ASC')
                ->orderBy('bulan', 'ASC');

            if ($request->filled('produk_id')) {
                $data->where('produk_id', $request->produk_id);
            }

            if ($request->filled('bulan') && $request->filled('tahun')) {
                $data->whereYear('tanggal', $request->tahun)
                    ->whereMonth('tanggal', $request->bulan);
            }

            return DataTables::of($data)
                ->filter(function ($query) {
                    if (request()->has('search.value')) {
                        $search = request('search.value');
                        $query->whereHas('produk', function ($q) use ($search) {
                            $q->where('nama', 'like', "%{$search}%");
                        });
                    }
                })
                ->addIndexColumn()
                ->addColumn('produk', function ($value) {
                    return $value->produk->nama;
                })
                ->addColumn('bulan', function ($value) {
                    $date = \DateTime::createFromFormat('!m', $value->bulan);
                    return $date->format('F') . ' ' . $value->tahun;
                })
                ->addColumn('jumlah', fn($value) => $value->jumlah)
                ->rawColumns(['jumlah', 'produk', 'bulan'])
                ->make(true);
        }
    }
}
