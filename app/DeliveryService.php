<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryService extends Model
{
    protected $fillable = ['name', 'slug', 'details', 'tracking_url', 'active'];
}
