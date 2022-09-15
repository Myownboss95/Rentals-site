<?php

namespace App\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PaymentMethod extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'payment_id', 'id');
    }
}
