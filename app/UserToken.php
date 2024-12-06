<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    protected $fillable = ['user_id','code','value','type','min_cart_amt','expiry_at','used_at','created_at','updated_at','order_id'];
    public function user($value='')
    {
    	$this->belongsTo('\App\User');
    }
    public function order($value='')
    {
    	$this->belongsTo('\App\Order');
    }
}

