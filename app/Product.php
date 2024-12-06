<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = ['id'];
	protected $appends = ['alt'];

	public function getAltAttribute()
	{
		if ($this->productImages()) {
			$alt = $this->productImages()->where('url', $this->base_img)->first();
			if ($alt) {
				return $alt->alt;
			} else {
				return "";
			}
		} else
			return "";
	}

	/* Stocks */
	public function stocks()
	{
		return $this->hasMany('App\Stock');
	}
	/* Stocks */
	public function stock()
	{
		return $this->hasOne('App\Stock');
	}
	/* Category */
	public function categories()
	{
		return $this->belongsToMany('App\Category', 'product_categories', 'product_id', 'category_id');
	}
	/* Product images */
	public function productImages()
	{
		return $this->hasMany('App\ProductImage');
	}
	/* Tags */
	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id');
	}
	/* Product Language Datas */
	public function productDetails()
	{
		return $this->hasMany('App\ProductDetail');
	}
}
