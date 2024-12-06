<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];
    protected $appends = ['orderCount'];
    // public function getTotalSpentAttribute() 
    //     {
    //         return $this->orders()->sum('net_amt');
    //     }
    public function getOrderCountAttribute()
    {
        return $this->orders()->count();
    }
    public function role()
    {
        return $this->belongsTo('\App\Role');
    }
    public function addresses()
    {
        return $this->hasMany('\App\Address');
    }
    public function userTokens()
    {
        return $this->hasMany('\App\UserToken');
    }
    /* User Cart */
    public function carts()
    {
        return $this->hasMany('\App\Cart');
    }
    /* User Orders */
    public function orders()
    {
        return $this->hasMany('\App\Order');
    }
    /* User Pending Orders */
    public function pendingOrders()
    {
        return $this->hasMany('\App\PendingOrder');
    }
    /* Wishlist Products */
    public function whishlistProducts()
    {
        return $this->hasMany('\App\WishlistProduct');
    }
}
