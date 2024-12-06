<?php

namespace App\Exports;

use App\Admin\Distributer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ExportDistributors implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Distributer::get();
    }

    public function map($distributer): array
    {

        return [
            $distributer->id,
            $distributer->name,
            $distributer->email,
            Carbon::parse($distributer->created_at)->format('d/m/Y'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'Created At'
        ];
    }
}
