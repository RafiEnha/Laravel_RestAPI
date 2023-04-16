<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan');
            $table->string('nama_ruangan');
            $table->integer('kapasitas');
            $table->timestamps();
        });

        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->timestamps();
        });

        Schema::create('peminjaman_ruangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ruangan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->date('tgl_pinjam');
            $table->string('nama_kegiatan');
            $table->timestamps();

            $table->foreign('id_ruangan')->references('id')->on('ruangans')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('cascade');
        });

        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjaman');
            $table->integer('nominal');
            $table->timestamps();

            $table->foreign('id_peminjaman')->references('id')->on('peminjaman_ruangans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ruangans');
        Schema::dropIfExists('pelanggans');
        Schema::dropIfExists('peminjaman_ruangans');
        Schema::dropIfExists('pembayarans');
    }
};