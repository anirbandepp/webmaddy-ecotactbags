<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'slug', 'type'];
    
    public function sets()
    {
      return $this->hasMany('App\AttributeSet', 'attribute_id');
    }
}
