<?php
// app/Order.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{   
    protected $guarded = ['id'];

    protected $table = 'order_items';
    public function order(){
        return $this->belongsTo(OrderItem::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}