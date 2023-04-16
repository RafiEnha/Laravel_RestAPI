<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Peminjaman_ruangan;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::paginate(10);
        return response()->json([
            'data' => $pembayaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pembayaran = Pembayaran::create([
            'id_peminjaman' => $request->id_peminjaman,
            'nominal' => $request->nominal
        ]);
        return response()->json([
            'data' => $pembayaran
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        $peminjamanJoin = Peminjaman_ruangan::where('id', $pembayaran->id_peminjaman)->first();

        $response = [
            "id_pembayaran" => $pembayaran->id,
            "tgl_pinjam" => $peminjamanJoin->tgl_pinjam,
            "nama_kegiatan" => $peminjamanJoin->nama_kegiatan,
            "nominal" => $pembayaran->nominal,
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->id_peminjaman = $request->id_peminjaman;
        $pembayaran->nominal = $request->nominal;
        $pembayaran->save();

        return response()->json([
            'data' => $pembayaran
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $Pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return response()->json([
            'message' => 'Pembayaran deleted'
        ], 204);    
    }
}
