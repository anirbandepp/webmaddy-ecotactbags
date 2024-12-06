<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupProduct extends Model
{
    protected $fillable = ['product_id','group_id'];

    public function product($value='')
    {
    	$this->belongsTo('\App\Product');
    }
}
