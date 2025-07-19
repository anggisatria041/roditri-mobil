<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Cicilan;
use App\Models\PembayaranCicilan;

class VerifikasiStatus extends Controller
{
    public function __invoke(Request $request)
    {
        // config dinamis model
        $model = '\\App\\Models\\' . $request->model;
        $model = new $model;

        $idData     = $request->id;
        $verifikasi = $request->verifikasi;

        // Siapkan data yang akan diupdate
        if ($verifikasi === 'status_pemesanan') {
            $data['status_pemesanan'] = $request->status;
            if ($request->status === 'Selesai') {
                $data['status_pembayaran'] = 'Lunas';
            }
        } else {
            $data['status'] = $request->status;
        }

        // Update data utama
        $save = $model::find($idData);
        $save->update($data);

        // Khusus model Pemesanan
        if ($request->model === 'Pemesanan') {
            $pemesanan = Pemesanan::find($idData);
            $tenor     = 'tenor_' . $pemesanan->tenor;
            $cicilan   = Cicilan::where('produk_id', $pemesanan->produk_id)->first();

            // Jika pesanan diterima dan jenis pembayaran kredit → buat detail cicilan
            if (
                $verifikasi === 'status_pemesanan' &&
                $request->status === 'Diterima' &&
                $pemesanan->jenis_pembayaran === 'kredit'
            ) {
                for ($i = 1; $i <= $pemesanan->tenor; $i++) {
                    PembayaranCicilan::create([
                        'pemesanan_id'         => $pemesanan->id,
                        'total_bayar'          => $cicilan->$tenor,
                        'cicilan'              => $i,
                        'bukti_pembayaran'     => null,
                        'tanggal_jatuh_tempo'  => now()->addMonths($i),
                        'tanggal_bayar'        => null,
                        'status'               => 'pending',
                    ]);
                }
            }
            // Jika pesanan ditolak dan kredit → hapus cicilan
            else if (
                $verifikasi === 'status_pemesanan' &&
                $request->status === 'Ditolak' &&
                $pemesanan->jenis_pembayaran === 'kredit'
            ) {
                PembayaranCicilan::where('pemesanan_id', $pemesanan->id)->delete();
            }
            // Jika pesanan ditarik → jangan hapus cicilan, hanya update status
            else if (
                $verifikasi === 'status_pemesanan' &&
                $request->status === 'Ditarik' &&
                $pemesanan->jenis_pembayaran === 'kredit'
            ) {
                PembayaranCicilan::where('pemesanan_id', $pemesanan->id)
                    ->update(['status' => 'Ditarik']);
            }
        }

        return response()->json([
            'status'      => true,
            'status_code' => 200,
            'message'     => 'Data berhasil disimpan.',
            'data'        => [
                'id' => $idData
            ]
        ], 200);
    }
}
