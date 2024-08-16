<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProof extends Model
{
    use HasFactory;
    protected $table = "payment_proof";
    protected $fillable = [
        'request_id', 
        'merchant_proof',
        'user_id',
        'payment_process'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
