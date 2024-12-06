<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    protected $guarded = ['id'];
    public function language()
    {
    	return $this->belongsTo('App\Language');
    }

    public function user($value='')
    {
    	return $this->belongsTo('App\User');
    }
    public function orderProducts()
  	{
  		return $this->hasMany('App\OrderProduct','order_id');
  	}
  	public function userUsedDiscounts()
  	{
  		return $this->hasOne('App\UserUsedDiscount','order_id');
  	}
  	public function careerPartner()
  	{
  		return $this->belongsTo('App\DeliveryService','carrier_partner');
  	}
}
