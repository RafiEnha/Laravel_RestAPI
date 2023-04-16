<?php

namespace App\Models;

use App\Models\Peminjaman_ruangan;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $fillable = [
        'nama',
        'email',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id     '
    ];

    public function peminjaman_ruangans()
    {
        return $this->hasMany(Peminjaman_ruangan::class);
    }
}