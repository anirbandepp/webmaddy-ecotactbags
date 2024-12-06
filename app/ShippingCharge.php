<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    protected $fillable = ['amt', 'tax_inclusive_rate', 'active'];
}
