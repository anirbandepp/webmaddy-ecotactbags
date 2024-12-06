<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = ['id'];
    
    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }
}