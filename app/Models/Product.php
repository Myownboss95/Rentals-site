<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [ 'name'];
    protected $guarded = ['id'];   
    
    protected $casts = [
        'images' => 'object',
        'product_tag' => 'object'
    ];
 
    public function category()
    { 
        return $this->belongsTo(Category::class);
    }
    public function wishlist()
    {
        return $this->belongsToMany(Wishlist::class);
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeMightAlsoLike($query) {
        return $query->inRandomOrder()->take(8);
    }
}
