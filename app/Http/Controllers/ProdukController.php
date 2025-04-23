<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitur;
use App\Models\Produk;
use App\Models\FiturProduk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

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
        $fitur = Fitur::all();
        return view('content.produk.list', compact('data', 'years', 'fitur'));
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

        $fitur_ids = $request->fitur_id;
        $produk = $data;

        foreach ($fitur_ids as $f_id) {
            FiturProduk::create([
                'fitur_id' => $f_id,
                'produk_id' => $produk->id
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
     * Display the specified resource.
     */
    public function show($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $produk =  Produk::find($decryptedId);
        $fitur =  Fitur::leftJoin('fitur_produk as fp', 'fp.fitur_id', '=', 'fitur.id')
            ->select('fitur.*')
            ->where('fp.produk_id', $decryptedId)->get();
        return view('content.produk.detail', compact('produk', 'fitur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::findOrFail($id);
        $fiturProduk = FiturProduk::where('produk_id', $id)->pluck('fitur_id')->toArray();
        $allFitur = Fitur::all();
        return response()->json([
            'data' => $data,
            'fiturProduk' => $fiturProduk,
            'allFitur' => $allFitur
        ], 200);
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

        $fitur_ids = $request->fitur_id ?? [];

        $existingFitur = FiturProduk::where('produk_id', $id)
            ->pluck('fitur_id')
            ->toArray();

        $fiturToDelete = array_diff($existingFitur, $fitur_ids);
        if (!empty($fiturToDelete)) {
            FiturProduk::where('produk_id', $id)
                ->whereIn('fitur_id', $fiturToDelete)
                ->delete();
        }
        $fiturToAdd = array_diff($fitur_ids, $existingFitur);
        if (!empty($fiturToAdd)) {
            foreach ($fiturToAdd as $fitur) {
                FiturProduk::create([
                    'produk_id' => $id,
                    'fitur_id' => $fitur
                ]);
            }
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
        FiturProduk::where('produk_id', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
}
