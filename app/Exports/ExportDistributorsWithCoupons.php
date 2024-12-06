<?php

namespace App\Exports;

use App\Admin\Distributer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportDistributorsWithCoupons implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Distributer::has('coupons')->get();
    }

    public function map($distributer): array
    {
        $coupons = [];

        if ($distributer->coupons) {
            foreach ($distributer->coupons as $key => $item) {
                array_push($coupons, $item->coupon_code);
            }
        }

        return [
            $distributer->id,
            $distributer->name,
            $distributer->email,
            implode(", ", $coupons),
            Carbon::parse($distributer->created_at)->format('d/m/Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'Coupons',
            'Created At'
        ];
    }
}
