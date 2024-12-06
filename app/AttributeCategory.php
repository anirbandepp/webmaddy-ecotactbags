<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{
    protected $fillable = ['attribute_id', 'category_id', 'sort_at'];
}
