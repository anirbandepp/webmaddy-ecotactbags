<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponMaster extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'coupon_code',
        'coupon_value',
        'coupon_type',
        'status',
        'expiry_at',
        'slug',
        'is_used'
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributer::class, 'distributors_id', 'id');
    }
}
