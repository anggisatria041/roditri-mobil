<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fitur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fitur::paginate(10);
        return view('content.fitur.list', compact('data'));
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
            'fitur' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }
        $data = Fitur::create([
            'fitur' => $request->fitur
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
        $data = Fitur::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Fitur::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data User tidak ditemukan',
            ]);
        }


        $validator = Validator::make($request->all(), [
            'fitur' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $data->update([
            'fitur' => $request->fitur
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Fitur::find($id);

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
