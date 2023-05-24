<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;

    protected $fillable = ['nama_tanaman', 'tanggal_panen', 'jumlah_panen'];

    public function pascapanen()
    {
        return $this->hasMany(Pascapanen::class);
    }

}
