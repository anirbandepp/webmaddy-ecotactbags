<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = ['id'];

    /* Stocks */
		public function stocks()
	  	{
		    return $this->hasMany('App\Stock','product_id');
		}
}
