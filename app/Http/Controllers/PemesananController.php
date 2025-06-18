<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Produk;
use App\Models\PembayaranCicilan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemesanan::orderBy('id', 'desc')->paginate(10);
        $user = User::where('role', 'user')->get();
        $produk = Produk::all();
        return view('content.pemesanan.list', compact('data', 'user', 'produk'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'produk_id' => 'required',
            'jenis_pembayaran' => 'required',
            'tenor' => 'required_if:jenis_pembayaran,kredit'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('file_pendukung', 'public');
            $ktp = $ktpPath;
        } else {
            $ktp = null;
        }

        if ($request->hasFile('slip_gaji')) {
            $slip_gajiPath = $request->file('slip_gaji')->store('file_pendukung', 'public');
            $slip_gaji = $slip_gajiPath;
        } else {
            $slip_gaji = null;
        }

        $data = Pemesanan::create([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'status_pembayaran' => 'Pending',
            'status_pemesanan' => 'Proses',
            'tenor' => $request->tenor ?? null,
            'tanggal' => now(),
            'ktp' => $ktp,
            'slip_gaji' => $slip_gaji,
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

    public function bukti_pembayaran(Request $request)
    {
        $id = $request->id;
        $data = Pemesanan::find($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaranPath = $request->file('bukti_pembayaran')->store('file_pendukung', 'public');
            $bukti_pembayaran = $bukti_pembayaranPath;
            $data->update([
                'bukti_pembayaran' => $bukti_pembayaran
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

    public function pembayaran_cicilan(Request $request)
    {
        $id = $request->id;
        $data = PembayaranCicilan::find($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaranPath = $request->file('bukti_pembayaran')->store('pembayaran_cicilan', 'public');
            $bukti_pembayaran = $bukti_pembayaranPath;
            $data->update([
                'bukti_pembayaran' => $bukti_pembayaran,
                'tanggal_bayar' => now()
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
    public function show(string $id)
    {
        $decryptedId = Crypt::decryptString($id);
        $data =  Pemesanan::find($decryptedId);
        $cicilan =  PembayaranCicilan::where('pemesanan_id', $decryptedId)->paginate(5);
        return view('content.pemesanan.detail', compact('data', 'cicilan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pemesanan::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Pemesanan::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Pemesanan tidak ditemukan',
            ]);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'produk_id' => 'required',
            'jenis_pembayaran' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $data->update([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'jenis_pembayaran' => $request->jenis_pembayaran,
        ]);

        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('file_pendukung', 'public');
            $ktp = $ktpPath;
            $data->update([
                'ktp' => $ktp
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
        $data = Pemesanan::find($id);

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
