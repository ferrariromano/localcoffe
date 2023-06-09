<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanaman';

    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
    ];

    public function jadwalPanen()
    {
        return $this->hasMany(JadwalPanen::class);
    }

    public function jadwalPascapanen()
    {
        return $this->hasMany(JadwalPascapanen::class);
    }
}
