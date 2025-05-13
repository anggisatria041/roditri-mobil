<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranCicilan extends Model
{
    protected $table = 'pembayaran_cicilan';
    public $timestamps = false;
    protected $guarded = [];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id', 'id');
    }
}
