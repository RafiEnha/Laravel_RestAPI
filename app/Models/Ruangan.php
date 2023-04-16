<?php

namespace App\Models;

use App\Models\Peminjaman_ruangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'kapasitas',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id'
    ];

    public function peminjaman_ruangans()
    {
        return $this->hasMany(Peminjaman_ruangan::class);
    }
}
