<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DeliveryService;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Excel;
use Carbon\Carbon;



class OrderController extends Controller
{

    private $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->allOrders();
        if($request){
            $orders = $this->orderRepository->srchOrders($request);
        }
        $orders = $orders->paginate(10);
        return view('admin.orders.orders',compact('orders','request'))->withInput(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderStatus , $id)
    {
        return view('admin.orders.order-details',[
            'order' => $this->orderRepository->orderDetail($id),
            'delivaryServices' => DeliveryService::pluck('name','id')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $oRequest,$orderStatus , $id)
    {
        $done = $oRequest->OrderUpdate($id);
        if($done['type'] == 'success'){
            return redirect()->route('orders.show',['OrderStatus' => $done['orderStatus'], 'order' => $done['orderId']])->with('global',$done['msg'])->with('type',$done['type']);
        }else{
            return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
        }
    }

    /**
     * Downloud Order Invoice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice(Request $request,$orderStatus,$id)
    {
        $order = $this->orderRepository->orderFindById($id)->with(
                ['userUsedDiscounts','user','orderProducts' => function($query) 
                    {
                        $query->with(['stock'=> function($query) 
                        {
                            $query->with('product');
                        }]);
                    }
                ])->first();
        $wrd = $this->amountToWord($order->net_amt);
        // return view('admin.orders.invoice',['order'=>$order,'wrd' => $wrd]);
        view()->share(['order'=>$order,'wrd' => $wrd]);
        $pdf = PDF::loadview('admin.orders.invoice');
        return $pdf->download('orders'.$id.'.pdf');
    }

    public function postBulkOrderUpdate(OrderRequest $oRequest,$orderStatus)
    {
        $done = $oRequest->OrdersUpdate();
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
    }
    public function ordersExports(Request $request,$orderStatus)
    {
        return view('admin.orders.ordersExport');
    }
    public function exportOrders(Request $request) 
    {
        if($request->date_range){
            $date = explode('-',$request->date_range);
            $start = Carbon::parse($date[0])->format('Y/m/d');
            $end = Carbon::parse($date[1])->format('Y/m/d');
            $orders = $this->orderRepository->allOrders()->whereDate('created_at', '>=',$start)->whereDate('created_at','<=',$end)->get();
        }
        $orderExcelArray = [];
        foreach($orders as $order){
            $buyProducts=$buyProductsprice=$qtys= [];
            $shippingAddr = $order->s_addr1.','.$order->s_addr2.','.$order->s_country.','.$order->s_state.','.$order->s_city.','.$order->s_pin;
            $billingAddr = $order->addr_line1.','.$order->addr_line2.','.$order->country.','.$order->state.','.$order->city.','.$order->pin;
            
            $cgst=$sgst='2.5%';
            $igst = '5%';
            $igstAmt =$cgstAmt =$sgstAmt = 0;
            $withoutTax = round(($order->gross_amt/105)*100,2);
            if($order->state != 'West Bengal'){
                $cgst=$sgst='0%';
                $igstAmt = round((5/100)*$withoutTax,2);
            }
            if($order->state == 'West Bengal'){
                $igst = '0%';
                $cgstAmt = round((2.5/100)*$withoutTax,2);
                $sgstAmt = round((2.5/100)*$withoutTax,2);
            }
            foreach($order->orderProducts as $orderProduct){
                $buyProducts[] = @$orderProduct->stock->product->name;
                $buyProductsprice[] = @$orderProduct->price;
                $qtys[] = @$orderProduct->qty;
            }
            array_push($orderExcelArray, ['invoice' => $order->invoice_no, 'date' => Carbon::parse($order->created_at)->toDateString(),'product' => @implode(', ', $buyProducts),'unit_price' =>@ implode(', ', $buyProductsprice), 'name' => $order->full_name, 'b_a' => $billingAddr, 's_a' => $shippingAddr, 'gst' => $order->gstin, 'qty' => @implode(', ', $qtys), 'cgst_rate' => $cgst, 'cgst_amt' => $cgstAmt, 'sgst_rate' => $sgst, 'sgst_amt' => $sgstAmt, 'igst_rate' => $igst, 'igst_amt' => $igstAmt, 'total_amt' => $order->net_amt]);
        }
        return (new OrderExport($orderExcelArray))->download('orders.xlsx');
    }

}
