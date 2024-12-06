<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingOrder extends Model
{
    protected $guarded = ['id'];

    public function orderProducts()
  	{
  		return $this->hasMany('App\PendingOrderProduct','pending_order_id');
  	}
  	public function user($value='')
    {
    	return $this->belongsTo('App\User');
    }
}