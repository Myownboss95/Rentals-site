<?php
// app/Order.php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{   
    protected $table = 'orders';
    protected $guarded = ['id'];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->generateReference();
    //     });
    // } 
    public function user(){
        return $this->belongsTo(User::class);
        
    }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
    
}