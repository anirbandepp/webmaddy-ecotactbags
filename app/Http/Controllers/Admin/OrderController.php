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
use App\Order;



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
        $orderDetails = $this->orderRepository->orderFindById($id)->with(
                ['userUsedDiscounts','user','orderProducts' => function($query) 
                    {
                        $query->with(['stock'=> function($query) 
                        {
                            $query->with('product');
                        }]);
                    }
                ])->first();
        if($orderDetails->carrier_partner == 5) {
            $lang = \App\Language::where('id',4)->first();
        }else{
            $lang = \App\Language::where('id',1)->first();
        }
        config(['app.lang' => $lang]);
        \App::setLocale($lang->slug);
        
        $wrd = $this->amountToWord($orderDetails->net_amt);
        view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
        $pdf = PDF::loadview('invoice');
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
        // return request()->all();
        if(request('start_date') && request('end_date')){
            $start = Carbon::parse($request->start_date)->format('Y/m/d');
            $end = Carbon::parse($request->end_date)->format('Y/m/d');
            $orders = $this->orderRepository->allOrders()->whereDate('created_at', '>=',$start)->whereDate('created_at','<=',$end)->get();
        }
        // return Excel::download(new OrderExport, 'orders.xlsx');
        return (new OrderExport($orders))->download('orders.xlsx');
        // return view('admin.export.ordersExportView',['orders'=>$orders]);
        // $orderExcelArray = [];
        // foreach($orders as $order){
            
        //     $customer_name = $order->name;
        //     $customer_email = $order->email;
        //     $customer_phone = $order->contact_no;
        //     $status = $order->status;
            
        //     $deliveryAddr = @$order->house_no.','.@$order->apertment_no.','.@$order->area.','.@$order->landmark.','.@$order->city.','.@$order->state.','.@$order->s_pin.','.@$order->country;
            
        //     $gross_amt=$order->gross_amt;
        //     $dis_amt = $order->discount_amt;
        //     $tax_amt = $order->tax_inclusive;
        //     $shipping_gst_amt = $order->shipping_gst;
        //     $shipping_amt = $order->shipping_charges;
        //     $net_amt = $order->net_amt;
            
        //     // $withoutTax = round(($order->gross_amt/105)*100,2);
        //     // if($order->state != 'West Bengal'){
        //     //     $cgst=$sgst='0%';
        //     //     $igstAmt = round((5/100)*$withoutTax,2);
        //     // }
        //     // if($order->state == 'West Bengal'){
        //     //     $igst = '0%';
        //     //     $cgstAmt = round((2.5/100)*$withoutTax,2);
        //     //     $sgstAmt = round((2.5/100)*$withoutTax,2);
        //     // }
        //     $buyProducts=$buyProductsprice=$qtys= [];
        //     foreach($order->orderProducts as $orderProduct){
                
        //         $quantity = @$orderProduct->qty;
        //         $stock = $orderProduct->stock;
        //         $language = $orderProduct->stock->language_id;
        //         $product = $stock->product->productDetails->where('language_id',$language)->first()->product_name;
        //         $productPrice = $stock->regular_price;
        //         array_push($buyProducts, @$product);
        //         array_push($buyProductsprice, @$productPrice);
        //         array_push($qtys, @$quantity);
                
        //         // $buyProducts[] = @$product;
        //         // $buyProductsprice[] = @$productPrice;
        //         // $qtys[] = @$quantity;
        //     }
            
        //     array_push($orderExcelArray, ['customer_name'=>$customer_name,'customer_email'=>$customer_email,'customer_phone'=>$customer_phone,'status'=>$status,'invoice' => $order->invoice_no, 'date' => Carbon::parse($order->created_at)->toDateString(), 'deliveryAddr' => $deliveryAddr,'gross_amt'=>$gross_amt,'dis_amt'=>$dis_amt, 'tax_amt'=>$tax_amt,'shipping_gst_amt'=>$shipping_gst_amt,'shipping_amt'=>$shipping_amt, 'net_amt' => $net_amt, 'product' => @implode(', ', $buyProducts),'productCount'=>count($buyProducts),'unit_price' =>@implode(', ', $buyProductsprice),'priceCount'=>count($buyProductsprice), 'qty' => @implode(', ', $qtys),'qtyCount'=>count($qtys)]);
        // }
        // return (new OrderExport($orderExcelArray))->download('orders.xlsx');
    }

}
