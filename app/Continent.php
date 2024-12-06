<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $guarded = ['id'];
    
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}