<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['alt','product_id','url','active'];
    protected $casts = [
        'publish_at' => 'datetime',
    ];
    public function product($value='')
    {
    	return $this->belongsTo('\App\Product');
    }
}
