<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::paginate(10);
        return response()->json([
            'data' => $ruangan
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
        $ruangan = Ruangan::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas'=> $request->kapasitas
        ]);
        return response()->json([
            'data' => $ruangan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $Ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        return response()->json([
            'data' => $ruangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $Ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kapasitas = $request->kapasitas;
        $ruangan->save();

        return response()->json([
            'data' => $ruangan
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $Ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return response()->json([
            'message' => 'Ruangan deleted'
        ], 204);    
    }
}
