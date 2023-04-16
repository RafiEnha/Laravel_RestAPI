<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman_ruangan;
use App\Models\Ruangan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman_ruangan::paginate(10);
        return response()->json([
            'data' => $peminjaman
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
        $peminjaman = Peminjaman_ruangan::create([
            'id_ruangan' => $request->id_ruangan,
            'id_pelanggan' => $request->id_pelanggan,
            'tgl_pinjam'=> $request->tgl_pinjam,
            'nama_kegiatan'=> $request->nama_kegiatan
        ]);
        return response()->json([
            'data' => $peminjaman
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman_ruangan  $Peminjaman_ruangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman_ruangan::with(['pelanggans', 'ruangans'])->findOrFail($id);

        return response()->json([
            'data' => $peminjaman
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman_ruangan  $Peminjaman_ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman_ruangan $peminjaman)
    {
        $peminjaman->id_ruangan = $request->id_ruangan;
        $peminjaman->id_pelanggan = $request->id_pelanggan;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->nama_kegiatan = $request->nama_kegiatan;
        $peminjaman->save();

        return response()->json([
            'data' => $peminjaman
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman_ruangan  $Peminjaman_ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman_ruangan $peminjaman)
    {
        $peminjaman->delete();
        return response()->json([
            'message' => 'Peminjaman_ruangan deleted'
        ], 204);    
    }
}
