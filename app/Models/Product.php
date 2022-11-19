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
        'images' => 'object'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
