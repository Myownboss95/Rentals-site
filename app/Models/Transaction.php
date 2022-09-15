<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $casts = [
        'options' => 'object',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->generateRefernce();
        });
    } 

    private function generateRefernce()
    {
        $ref = Str::random(8);
        while ($this->where('reference', $ref)->exists()) {
            $ref = Str::random(8);
        }
        $this->reference = $ref;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_id');
    }
}
