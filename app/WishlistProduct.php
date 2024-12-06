<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    protected $fillable = ['user_id', 'stock_id'];

    public function stock()
    {
        return $this->belongsTo('\App\Stock');
    }
}
