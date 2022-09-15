<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tradeable extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
    ];

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
