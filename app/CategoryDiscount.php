<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDiscount extends Model
{
    protected $fillable = ['category_id', 'percent_rate', 'details', 'active', 'start_at', 'end_at'];
}
