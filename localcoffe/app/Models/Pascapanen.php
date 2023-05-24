<?php

namespace App\Models;
use App\Models\Panen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pascapanen extends Model
{
    use HasFactory;


    protected $fillable = ['nama_produk', 'tanggal_kemasan'];

    public function panen()
    {
        return $this->belongsTo(Panen::class);
    }
}
