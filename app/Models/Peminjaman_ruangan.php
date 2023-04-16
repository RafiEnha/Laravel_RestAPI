<?php

namespace App\Models;

use App\Models\Pelanggan;
use App\Models\Ruangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_ruangan extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 

    protected $hidden = [
        'created_at',
        'updated_at',
        'id_ruangan',
        'id_pelanggan'
    ];

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }

    public function ruangans()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id');
    }
}
