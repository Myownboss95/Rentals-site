<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function accounts()
    {
        return $this->hasOne(Account::class);
    }
    public function userCart(){
        return $this->hasMany(Cart::class);
    }
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class);
    }

    public function accountBalance()
    {
          $account = $this->accounts()->first();
        return (float) $account?->account ?? 0;
    }
    public function generateAccounts()
    {
        $this->accounts()->createMany([
            [
                'account' => 0.00,
            ]
        ]);
    }
    // public function generateAccounts()
    // {
    //     $coins = [];
    //     PaymentMethod::whereStatus(1)->get()->map(function ($method) use (&$coins) {
    //         $coins[] = [
    //             'account' => 0, 'symbol' => strtolower($method->symbol), 'type' => strtolower($method->name),
    //             'svg' => strtolower($method->svg),
    //             'coin_id' => strtolower($method->id),
    //             'status' => strtolower($method->status)
    //         ];
    //     });
    //     $this->accounts()->createMany($coins);
        
    // }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function bots()
    {
        return $this->belongsToMany(Bot::class)->withPivot(['status', 'id']);
    }

    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }
    public function orders(){
        return $this->hasMany(Order::class);
        
    }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
        
    }
}
