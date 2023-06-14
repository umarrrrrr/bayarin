<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Nasabah;
use App\Models\Tagihan;

class PembayaranController extends Controller
{
    public function index($id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }
    {
        $tagihans = Tagihan::all();

        return response()->json([
            'tagihans' => $tagihans
        ], 200);
    }
        $tagihan = $nasabah->tagihan;

        return response()->json([
            'message' => 'Data tagihan berhasil diambil',
            'tagihan' => $tagihan
        ], 200);
    }
    public function store(PembayaranRequest $request, $id)
{
    $nasabah = Nasabah::find($id);

    if (!$nasabah) {
        return response()->json([
            'message' => 'Akun nasabah tidak ditemukan'
        ], 404);
    }

    $tagihan = Tagihan::where('nasabah_id', $nasabah->id)
        ->where('nomor_tagihan', $request->input('nomor_tagihan'))
        ->where('jumlah_tagihan', $request->input('jumlah_tagihan'))
        ->first();

    if (!$tagihan) {
        return response()->json([
            'message' => 'Tagihan tidak ditemukan'
        ], 404);
    }

    $tagihan->update([
        'status_pembayaran' => 'Lunas'
    ]);

    return response()->json([
        'message' => 'Pembayaran berhasil',
        'pembayaran' => $tagihan
    ], 201);
}

}
