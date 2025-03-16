<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitur;
use App\Models\Produk;
use App\Models\FiturProduk;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentYear = date('Y');
        $startYear = 2017;
        $years = range($currentYear, $startYear);
        $data = Produk::paginate(10);
        return view('content.produk.list', compact('data', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'bahan_bakar' => 'required',
            'tipe' => 'required',
            'jumlah_muatan' => 'required',
            'masa_berlaku_stnk' => 'required',
            'jarak_tempuh' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('foto_produk', 'public');
            $gambar = $gambarPath;
        } else {
            $gambar = null;
        }

        $data = Produk::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'harga' => preg_replace('/[^0-9]/', '', $request->harga),
            'deskripsi' => $request->deskripsi,
            'warna' => $request->warna,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'bahan_bakar' => $request->bahan_bakar,
            'tipe' => $request->tipe,
            'jumlah_muatan' => $request->jumlah_muatan,
            'masa_berlaku_stnk' => $request->masa_berlaku_stnk,
            'jarak_tempuh' => $request->jarak_tempuh,
            'foto' => $gambar
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Menyimpan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menyimpan Data',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Produk::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data User tidak ditemukan',
            ]);
        }


        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'bahan_bakar' => 'required',
            'tipe' => 'required',
            'jumlah_muatan' => 'required',
            'masa_berlaku_stnk' => 'required',
            'jarak_tempuh' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $data->update([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'harga' => preg_replace('/[^0-9]/', '', $request->harga),
            'deskripsi' => $request->deskripsi,
            'warna' => $request->warna,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'bahan_bakar' => $request->bahan_bakar,
            'tipe' => $request->tipe,
            'jumlah_muatan' => $request->jumlah_muatan,
            'masa_berlaku_stnk' => $request->masa_berlaku_stnk,
            'jarak_tempuh' => $request->jarak_tempuh
        ]);

        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('foto_produk', 'public');
            $foto = $gambarPath;
            $data->update([
                'foto' => $foto
            ]);
        }

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Menyimpan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menyimpan Data',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::find($id);

        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
}
