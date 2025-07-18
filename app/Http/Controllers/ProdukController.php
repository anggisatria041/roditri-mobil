<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitur;
use App\Models\Produk;
use App\Models\Cicilan;
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
            'tenor_12' => 'required',
            'tenor_24' => 'required',
            'tenor_36' => 'required',
            'tenor_48' => 'required',
            'tenor_60' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'bahan_bakar' => 'required',
            'tipe' => 'required',
            'jumlah_muatan' => 'required',
            'masa_berlaku_stnk' => 'required',
            'jarak_tempuh' => 'required',
            'deskripsi' => 'required',
            'tour_id' => 'nullable',
            'foto1' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'foto2' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'foto3' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],
            'foto4' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        // Upload semua foto
        $foto1 = $request->hasFile('foto1') ? $request->file('foto1')->store('foto_produk', 'public') : null;
        $foto2 = $request->hasFile('foto2') ? $request->file('foto2')->store('foto_produk', 'public') : null;
        $foto3 = $request->hasFile('foto3') ? $request->file('foto3')->store('foto_produk', 'public') : null;
        $foto4 = $request->hasFile('foto4') ? $request->file('foto4')->store('foto_produk', 'public') : null;

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
            'tour_id' => $request->tour_id,
            'foto1' => $foto1,
            'foto2' => $foto2,
            'foto3' => $foto3,
            'foto4' => $foto4,
        ]);

        // Simpan cicilan
        Cicilan::create([
            'produk_id' => $data->id,
            'tenor_12' => preg_replace('/[^0-9]/', '', $request->tenor_12),
            'tenor_24' => preg_replace('/[^0-9]/', '', $request->tenor_24),
            'tenor_36' => preg_replace('/[^0-9]/', '', $request->tenor_36),
            'tenor_48' => preg_replace('/[^0-9]/', '', $request->tenor_48),
            'tenor_60' => preg_replace('/[^0-9]/', '', $request->tenor_60),
        ]);

        // Simpan fitur produk
        foreach ($request->fitur_id as $f_id) {
            FiturProduk::create([
                'fitur_id' => $f_id,
                'produk_id' => $data->id,
            ]);
        }

        return response()->json([
            'status' => $data ? true : false,
            'message' => $data ? 'Berhasil Menyimpan Data' : 'Gagal Menyimpan Data',
        ]);
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
        $cicilan =  Cicilan::where('produk_id', $decryptedId)->first();

        return view('content.produk.detail', compact('produk', 'fitur', 'cicilan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::findOrFail($id);
        $fiturProduk = FiturProduk::where('produk_id', $id)->pluck('fitur_id')->toArray();
        $allFitur = Fitur::all();
        $cicilan = Cicilan::where('produk_id', $id)->first();
        return response()->json([
            'data' => $data,
            'fiturProduk' => $fiturProduk,
            'allFitur' => $allFitur,
            'cicilan' => $cicilan,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Produk::find($id);
        $cicilan = Cicilan::where('produk_id', $id)->first();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data produk tidak ditemukan',
            ]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'tenor_12' => 'required',
            'tenor_24' => 'required',
            'tenor_36' => 'required',
            'tenor_48' => 'required',
            'tenor_60' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'bahan_bakar' => 'required',
            'tipe' => 'required',
            'jumlah_muatan' => 'required',
            'masa_berlaku_stnk' => 'required',
            'jarak_tempuh' => 'required',
            'deskripsi' => 'required',
            'tour_id' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        // Update data produk
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
            'jarak_tempuh' => $request->jarak_tempuh,
            'tour_id' => $request->tour_id,
        ]);

        // Update cicilan
        $cicilan->update([
            'tenor_12' => preg_replace('/[^0-9]/', '', $request->tenor_12),
            'tenor_24' => preg_replace('/[^0-9]/', '', $request->tenor_24),
            'tenor_36' => preg_replace('/[^0-9]/', '', $request->tenor_36),
            'tenor_48' => preg_replace('/[^0-9]/', '', $request->tenor_48),
            'tenor_60' => preg_replace('/[^0-9]/', '', $request->tenor_60),
        ]);

        // Update foto utama & foto tambahan
        $fotoFields = ['foto1', 'foto2', 'foto3', 'foto4'];

        foreach ($fotoFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('foto_produk', 'public');
                $data->update([$field => $path]);
            }
        }

        // Update fitur produk
        $fitur_ids = $request->fitur_id ?? [];
        $existingFitur = FiturProduk::where('produk_id', $id)->pluck('fitur_id')->toArray();

        $fiturToDelete = array_diff($existingFitur, $fitur_ids);
        if (!empty($fiturToDelete)) {
            FiturProduk::where('produk_id', $id)->whereIn('fitur_id', $fiturToDelete)->delete();
        }

        $fiturToAdd = array_diff($fitur_ids, $existingFitur);
        foreach ($fiturToAdd as $fitur) {
            FiturProduk::create([
                'produk_id' => $id,
                'fitur_id' => $fitur,
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menyimpan Data',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Produk::find($id);
        $cicilan = Cicilan::where('produk_id', $data->id)->first();

        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditemukan'
            ], 404);
        }

        $cicilan->delete();
        $data->delete();
        FiturProduk::where('produk_id', $id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
}
