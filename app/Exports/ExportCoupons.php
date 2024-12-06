<?php

namespace App\Exports;

use App\Admin\CouponMaster;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportCoupons implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return CouponMaster::get();
    }


    public function map($coupon): array
    {
        $isUsed = 'No';
        if ($coupon->is_used) {
            $isUsed = 'Yes';
        }

        return [
            $coupon->id,
            $coupon->coupon_code,
            $coupon->coupon_value,
            $coupon->coupon_type,
            $coupon->status,
            Carbon::parse($coupon->expiry_at)->format('d/m/Y'),
            $isUsed,
            Carbon::parse($coupon->created_at)->format('d/m/Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Coupon code',
            'Coupon_value',
            'Coupon_type',
            'Status',
            'Expiry At',
            'Is used',
            'Created At'
        ];
    }
}
