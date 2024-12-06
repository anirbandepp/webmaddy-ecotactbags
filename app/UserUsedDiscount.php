<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUsedDiscount extends Model
{
  protected $fillable = ['user_id', 'discount_type', 'discount_value', 'type', 'min_cart_amt', 'max_cart_amt', 'expiry_at', 'order_id'];

  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
