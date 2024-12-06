<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    protected $fillable = ['user_id','stock_id','qty','notes'];
}
