<?php

namespace App\Http\Controllers;

use App\Models\PembayaranCicilan;
use Carbon\Carbon;

class TunggakanController extends Controller
{
    public function index()
    {
        $data = PembayaranCicilan::where('status', 'pending')
            ->whereDate('tanggal_jatuh_tempo', '<=', Carbon::today())
            ->paginate(10);
        return view('content.tunggakan.list', compact('data'));
    }
}
