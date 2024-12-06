<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distributer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'email',
    ];

    public function coupons()
    {
        return $this->hasMany(CouponMaster::class, 'distributors_id', 'id');
    }
}
