<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingOrderProduct extends Model
{
    protected $fillable = ['pending_order_id','stock_id','product_info','price','tax_rate','qty',];
    public function pendingOrder()
    {
    	return $this->belongsTo('\App\PendingOrder','pending_order_id');
    }
    /* stock */
	  public function stock()
	  {
	    return $this->belongsTo('App\Stock');
	  }
}