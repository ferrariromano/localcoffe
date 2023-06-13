<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'transfer_amount',
        'transfer_account',
        'status',
        'receipt_image_path',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 'pending':
                return 'Menunggu Konfirmasi';
            case 'processed':
                return 'Diproses';
            case 'accepted':
                return 'Diterima';
            case 'rejected':
                return 'Ditolak';
            default:
                return '';
        }
    }

    public function getReceiptImageAttribute()
    {
        if (!empty($this->receipt_image_path)) {
            return asset('storage/' . $this->receipt_image_path);
        }

        return null;
    }
}
