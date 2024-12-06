<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class OrderExport implements FromCollection , WithHeadings ,ShouldAutoSize
class OrderExport implements FromView
{
    use Exportable;
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }
  
    // public function collection()
    // {
    //     //return $this->UserTestSeries;
    //     return collect($this->orders);

    // }
    
    public function view(): View
    {
        return view('admin.export.ordersExportView',['orders'=>$this->orders]);
    }
    
    // public function headings(): array
    // {
        
    //         $headers = [
    //             'customer_name',
    //             'customer_email',
    //             'customer_phone',
    //             'status',
    //             'invoice' ,
    //             'date',
    //             'deliveryAddr',
    //             'gross_amt',
    //             'dis_amt',
    //             'tax_amt',
    //             'shipping_gst_amt',
    //             'shipping_amt',
    //             'net_amt',
    //         ];
    //         foreach($this->orders->product as $key => $product){
    //             array_push($headers,'product'.$key+1);
    //         }
    //         return [ $headers ];
           
        
    // }
}
