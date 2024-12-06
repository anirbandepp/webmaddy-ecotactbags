<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $fillable = ['name'];

	/* Groups */
	public function products()
	{
		return $this->belongsToMany('App\Product', 'group_products', 'group_id', 'product_id');
	}
}
