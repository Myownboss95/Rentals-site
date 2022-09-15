<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tradeable()
    {
        return $this->belongsTo(Tradeable::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function close()
    {
        $user = $this->user;
        $account = $user->accounts()->where('type', 'invested')->first();
        $account->account += $this->returns + $this->amount;
        $this->status = 'closed';
        $this->save();
        $account->save();
    }

}
