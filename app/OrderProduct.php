<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id','stock_id','product_info','price','tax_rate','qty','status'];

    /* stock */
	  public function stock()
	  {
	    return $this->belongsTo('App\Stock');
	  }
}
