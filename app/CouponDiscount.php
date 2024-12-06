<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponDiscount extends Model
{
    protected $fillable = ['name', 'value', 'details', 'type', 'active', 'min_cart_amt', 'max_cart_amt', 'expiry_at'];
}
