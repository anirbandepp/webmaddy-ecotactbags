<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class UserExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    private $req;

    public function __construct($request)
    {
        $this->req = $request;
    }

    public function collection()
    {
        $users = User::orderBy('id', 'desc')->get()
            ->makeHidden([
                'password', 'provider_id', 'updated_at', 'device_token', 'remember_token',
                'email_verified_at', 'phone_verified_at', 'provider', 'last_login', 'created_at', 'role_id'
            ]);

        if ($this->req->from_date || $this->req->to_date) {
            $start = Carbon::parse(@$this->req->from_date)->format('Y/m/d');
            $end = Carbon::parse(@$this->req->to_date)->format('Y/m/d');
            $users = User::orderBy('id', 'desc')->whereDate('created_at', '>=', @$start)
                ->whereDate('created_at', '<=', @$end)
                ->get()
                ->makeHidden([
                    'password', 'provider_id', 'updated_at', 'device_token', 'remember_token',
                    'email_verified_at', 'phone_verified_at', 'provider', 'last_login', 'created_at', 'role_id'
                ]);
        }
        return collect($users);
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'PHONE',
            'COUNTRY',
            'BUSINESS NAME',
            'FIXED DISCOUNT',
            'TOTAL SPENT',
            'ORDER COUNT',
        ];
    }
}
