<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeExpired(Builder $query)
    {
        return $query->whereTime('expires_at', '<=', now()->toDateTimeString());
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInActive(Builder $query)
    {
        return $query->where('status', 'inactive');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
