<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = ['id'];

    public function State($value = '')
    {
        $this->belongsTo('\App\State', 'state_id');
    }
    public function partner($value = '')
    {
        return $this->belongsTo('\App\DeliveryService', 'carrier_partner');
    }
}
