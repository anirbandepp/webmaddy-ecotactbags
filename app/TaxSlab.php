<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxSlab extends Model
{
    protected $fillable = ['name', 'percent_rate', 'active'];
}
