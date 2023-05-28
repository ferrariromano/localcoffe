<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPanen extends Model
{
    use HasFactory;

    protected $table = 'jadwal_panen';

    protected $fillable = [
        'tanaman_id',
        'tanggal',
        'deskripsi',
    ];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class);
    }

}
