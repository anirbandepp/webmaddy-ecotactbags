<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeSet extends Model
{
    protected $fillable = ['attribute_id', 'value', 'name', 'slug'];
    
    public function attribute()
    {
      return $this->belongsTo('App\Attribute', 'attribute_id');
    }
}
