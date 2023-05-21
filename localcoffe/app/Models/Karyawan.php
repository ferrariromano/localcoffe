<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rec_id',
        'full_name',
        'sex',
        'email_address',
        'phone_number',
        'position',
        'department',
        'salary',
    ];

}
