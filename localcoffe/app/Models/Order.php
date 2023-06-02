<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'status',
        'additional_fee',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
