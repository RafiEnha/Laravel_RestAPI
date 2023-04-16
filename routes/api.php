<?php

use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('pembayaran', PembayaranController::class);
Route::apiResource('peminjaman_ruangan', PeminjamanController::class);
Route::apiResource('ruangan', RuanganController::class);