<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','stock_id'];

    public function user($value='')
    {
    	return $this->belongsTo('\App\User');
    }
}
