<?php

namespace App\Http\Controllers;

use App\Http\Traits\SlugTrait;
use App\PendingOrder;
use App\PendingOrderProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response as Response;
use Illuminate\Support\Facades\DB as DB;

class CartController extends Controller
{
    use SlugTrait;

    private $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->cart = Session::get('cart');
            return $next($request);
        });
        $this->cart = Session::get('cart');
    }

    public function addToCart(Request $request)
    {
        // return $this->cart;
        $product = json_decode(request()->getContent(), true);
        if ($product['qty'] > 0) {
            if (isset($product['sku'])) {
                $stock = \App\Stock::where('sku', $product['sku'])->first();
            }

            if (isset($this->cart[$product['sku']])) {
                $this->cart[$product['sku']]['qty'] = $product['qty'];
                $this->cart[$product['sku']]['pieces'] = $stock->pieces;
                $this->cart[$product['sku']]['max_allowed_qty'] = $stock->max_allowed_qty;
            } else {
                $this->cart[$product['sku']] = $product;
                $this->cart[$product['sku']]['qty'] = $product['qty'];
                $this->cart[$product['sku']]['pieces'] = $stock->pieces; // Dynamically add initial qty
                $this->cart[$product['sku']]['max_allowed_qty'] = $stock->max_allowed_qty;
            }

            $msg = null;
            if ($product['qty'] >= $stock->max_allowed_qty) {
                $msg = 'Cart Updated. Congratulations! 5% discount applied on your order.';
                //$msg = 'Cart Updated.';
            } else {
                $msg = 'Cart Updated.';
            }
            Session::put('cart', $this->cart);
            $done = $this->cartCalculation();
            return Response::json(['type' => 'success', 'cartCount' => count($this->cart), 'message' => $msg, 'gst' => $done['gst'], 'currentQty' => $product['qty'], 'maxAllowedQty' => $stock->max_allowed_qty, 'total' => $done['total'], 'totQty' => $done['totQty'], 'discountedAmount' => $done['discountedAmount'], 'isCoupon' => $done['isCoupon'], 'disValue' => $done['disValue'], 'totdiscountedTotal' => $done['totdiscountedTotal'], 'currency' => config('app.lang')->currency]);
        } else {
            return Response::json(['type' => 'error', 'cartCount' => count($this->cart), 'message' => 'Invalid Quantity']);
        }
    }

    public function removeFromCart($sku)
    {
        // $cart = Session::get('cart');
        unset($this->cart[$sku]);
        $done = $this->cartCalculation();
        if (count($done['stocks']) > 0) {
            $this->cart['coupon_id'] = null;
        }
        Session::put('cart', $this->cart);
        //return $this->cart;
        return redirect()->route('cartItems');
    }

    public function cartItems()
    {
        // return auth()->user();
        $done = $this->cartCalculation();
        //return auth()->user()->id;
        if (auth()->check()) {

            $token = \App\UserToken::where('user_id', auth()->user()->id)->whereDate('expiry_at', '>=', \Carbon::today())->first();
        }

        return view('carts', ['stocks' => $done['stocks'], 'cartDetails' => $done['cartDetails'], 'gst' => $done['gst'], 'total' => $done['total'], 'totdiscountedTotal' => $done['totdiscountedTotal'], 'totQty' => $done['totQty'], 'token' => $token ?? null, 'isCoupon' => $done['isCoupon'], 'disValue' => $done['disValue'], 'discountedTotal' => $done['discountedTotal']]);
    }

    public function addressConfirm()
    {
        if (config('app.lang')->slug == 'in') {
            if ($this->cartCalculation()) {
                $done1 = $this->cartCalculation();
                if ($done1) {
                    if ($done1['isCoupon']) {
                        $tot = $done1['discountedTotal'];
                    } else {
                        $tot = $done1['total'];
                    }
                    if ($tot > 100000) {
                        return redirect()->back()->with('global', 'Cart Value Can\'t  Be Over 1 Lakh')->with('type', 'error');
                    }
                }
            }
        }

        if (session()->get('addrId')) {
            $addr = \App\Address::where('id', session()->get('addrId'))->first();
        } else {
            $addr = new \App\Address;
        }

        if (Session::has('cart')) {

            $done = $this->cartCalculation();
            if (auth()->check()) {
                $codes = DB::table('country_phone_code')->select('countries_isd_code')->get();
                $countries = \App\Country::pluck('counrty_name', 'id')->all();
                // if($done['totWeight'] > 1000){
                //     $partners = \App\DeliveryService::where('active',1)->pluck('name','id')->all();
                //     if(config('app.lang')->slug == 'in'){
                //         $partners = \App\DeliveryService::where('active',1)->where('slug','bluedart')->pluck('name','id')->all();
                //     }
                // }else{
                //     $partners = \App\DeliveryService::where('active',1)->where('name','Dhl')->pluck('name','id')->all();
                //     if(config('app.lang')->slug == 'in'){
                //         $partners = \App\DeliveryService::where('active',1)->where('slug','bluedart')->pluck('name','id')->all();
                //     }
                // }
                if (config('app.lang')->slug == 'in') {
                    if ($done['totWeight'] < 50) {
                        $partners = \App\DeliveryService::where('active', 1)->where('slug', 'bluedart')->pluck('name', 'id')->all();
                    } else {
                        $partners = \App\DeliveryService::where('active', 1)->whereIn('slug', ['bluedart', 'byroad'])->pluck('name', 'id')->all();
                    }
                } else {
                    if ($done['totWeight'] < 100) {
                        $partners = \App\DeliveryService::where('active', 1)->where('slug', 'dhl')->pluck('name', 'id')->all();
                    } elseif ($done['totWeight'] < 1000) {
                        $partners = \App\DeliveryService::where('active', 1)->whereIn('slug', ['dhl', 'air'])->pluck('name', 'id')->all();
                    } else {
                        $partners = \App\DeliveryService::where('active', 1)->whereIn('slug', ['dhl', 'air', 'sea'])->pluck('name', 'id')->all();
                    }
                }

                $user_addresses = \App\Address::where('user_id', auth()->user()->id)->get();
                // $partners = \App\DeliveryService::where('active',1)->where('name','!=','DHL')->pluck('name','id')->all();
                return view('cart_address', compact('codes', 'countries', 'partners', 'addr', 'user_addresses'));
            } else {
                return redirect()->route('home')->with('global', 'Login')->with('type', 'warning');
            }
        } else {
            return redirect()->route('home')->with('global', 'Empty Cart')->with('type', 'warning');
        }
    }

    public function postAddressConfirm()
    {

        if (session()->has('billing_address')) {
            session()->forget('billing_address');
        }
        // return request()->all();
        $billAddress = [
            'billing_house_no' => request('billing_house_no'),
            'billing_apertment_no' => request('billing_apertment_no'),
            'billing_area' => request('billing_area'),
            'billing_landmark' => request('billing_landmark'),
            'billing_city' => request('billing_city'),
            'billing_country' => request('billing_country'),
            'billing_state' => request('billing_state'),
            'billing_pin' => request('billing_pin'),
            'billing_gstin' => request('billing_gstin')
        ];
        if (count($billAddress)) {
            session()->put('billing_address', $billAddress);
        }
        if (request('id')) {
            $newAddress = \App\Address::where('id', request('id'))->first();
        } else {
            $newAddress = new \App\Address;
        }
        $country = \App\Country::where('counrty_name', 'like', '%' . request('country') . '%')->first();
        $newAddress->fill(request()->all());
        // if(config('app.lang')->slug == 'in'){
        //     $newAddress->carrier_partner = 5;
        // }
        $newAddress->c_code = $country ? $country->iso : null;
        $newAddress->user_id = auth()->user()->id;
        $newAddress->save();
        session()->put('addrId', $newAddress->id);


        if (request('choosed') == 'yes') {
            return redirect()->route('addressConfirm')->with('newAddress', $newAddress);
        } else {
            return redirect()->route('getOrderSummery')->with('newAddress', $newAddress);
        }
    }

    public function getOrderSummery()
    {
        $done = $this->cartCalculation();
        $totalWeight = $done['totWeight'] > 0 ? $done['totWeight'] : 0;
        $newAddress = \App\Address::where('id', session()->get('addrId'))->first();
        session()->forget('shipping-charge');

        if ($done['demo'] != true) {
            if ($newAddress->carrier_partner == 4) {
                if (config('app.lang')->slug != 'in') {
                    // return $newAddress;
                    $result = $this->calculateDelivery($newAddress->id);
                    if ($result == 'error' || session()->get('shipping-charge') == 0) {
                        return back()->with('global', 'Correct your address')->with('type', 'error');
                    }
                }
            }
            if ($newAddress->carrier_partner == 5) {
                if (config('app.lang')->slug == 'in') {
                    $c = ceil($totalWeight) * 200;
                    session()->put('shipping-charge', $c);
                    //$done = $this->cartCalculation();
                }
            }
        }
        return view('new_order_summery', [
            'newAddress' => $newAddress,
            'cartDetails' => $done['cartDetails'],
            'gst' => $done['gst'],
            'total' => $done['total'],
            'totQty' => $done['totQty'],
            'isCoupon' => $done['isCoupon'],
            'disValue' => $done['disValue'],
            'discountedTotal' => $done['discountedTotal'],
            'totdiscountedTotal' => $done['totdiscountedTotal'],
            'disType' => $done['disType']
        ]);
    }

    public function createOrder(Request $request)
    {
        if ($this->cart) {
            DB::beginTransaction();
            try {
                if (session()->get('addrId')) {
                    $newAddress = \App\Address::where('id', session()->get('addrId'))->first();
                    $done = $this->cartCalculation();
                    $total = $done['total'];
                    $discountedAmount = $done['discountedAmount'];
                    $discountedTotal = $done['discountedTotal'];
                    $gst = $done['gst'];

                    $user = auth()->user();
                    $discountType = null;
                    $coupon = null;
                    $dis = 0;
                    if (@$this->cart['coupon_id'] && @$done['isCoupon']) {
                        $coupon = \App\UserToken::where('user_id', auth()->user()->id)->where('id', '=', $this->cart['coupon_id'])->whereDate('expiry_at', '>=', \Carbon::today())->first();
                        if ($coupon) {
                            $discountType = 'coupon discount';
                            $dis = $done['discountedAmount'];
                        }
                        //$total = $done['discountedTotal'];
                    }
                    $charge = 0;
                    if (session()->get('shipping-charge')) {
                        $charge = session()->get('shipping-charge');
                    }
                    $shipGst = 0;
                    if (config('app.lang')->slug == 'in') {
                        $shipGst = $charge * 0.18;
                    }
                    $exactTotal = $done['exclTaxTotal'] - $dis + $gst; // 425-42.05+68.85
                    session()->forget('shipping-charge');

                    $billAddr = session()->pull('billing_address');
                    $order = PendingOrder::create([
                        'invoice_no' =>  $this->invoiceNumber(),
                        'language_id' => config('app.lang')->id,
                        'user_id' => $user->id,
                        'name' => $newAddress->name,
                        'email' => $newAddress->email,
                        'contact_no' => $newAddress->contact_no,
                        'house_no' => $newAddress->house_no,
                        'area' => $newAddress->area,
                        'apertment_no' => $newAddress->apertment_no,
                        'landmark' => $newAddress->landmark,
                        'state' => $newAddress->state,
                        'city' => $newAddress->city,
                        'country' => $newAddress->country,
                        'gstin' => $newAddress->gstin,
                        'pincode' => $newAddress->pin,
                        'payment_gateway' => 'rejor_pay',
                        'gross_amt' => $done['exclTaxTotal'] + $gst ?? 0,
                        'discount_amt' => $discountedAmount,
                        'net_amt' => ($exactTotal + $charge + $shipGst),
                        'tax_inclusive' => $gst ?? 0,
                        'user_token_id' => $coupon ? $coupon->id : null,
                        'discount_value' => $done['disValue'],
                        'order_type' => 'online',
                        'status' => 'Pending',
                        'discount_type' => $discountType,
                        'type' => $coupon ? $coupon->type : null,
                        'min_cart_amt' => 0,
                        'max_cart_amt' => 0,
                        'expiry_at' => 0,
                        'carrier_partner' => $newAddress->carrier_partner,
                        'shipping_charges' => $charge,
                        'shipping_gst' => $shipGst,
                        'max_allowed_discount_percentage' => $done['max_allowed_discount_percentage'],
                        'user_discount_percentage' => $done['user_discount_percentage'],
                        'extra_discount' => $done['totdiscountedTotal'],
                        'billing_house_no' => $billAddr['billing_house_no'],
                        'billing_apertment_no' => $billAddr['billing_apertment_no'],
                        'billing_area' => $billAddr['billing_area'],
                        'billing_landmark' => $billAddr['billing_landmark'],
                        'billing_city' => $billAddr['billing_city'],
                        'billing_country' => $billAddr['billing_country'],
                        'billing_state' => $billAddr['billing_state'],
                        'billing_pin' => $billAddr['billing_pin'],
                        'billing_gstin' => $billAddr['billing_gstin']
                    ]);

                    // return $order;
                    $stocks = \App\Stock::whereIn('sku', array_keys($this->cart))->with('product')->get();
                    foreach ($stocks as $stk) {
                        $orderProducts = PendingOrderProduct::create([
                            'pending_order_id'  => $order->id,
                            'stock_id' => $stk->id,
                            'price' => $stk->offer_price,
                            'tax_rate' => 0,
                            'qty' => $this->cart[$stk->sku]['qty'],
                        ]);
                    }
                    if ($user && $order) {
                        Session::put('orderId', $order->id);
                        Session::put('normalOrder', 0);
                        DB::commit();
                        return redirect()->route('paymentInitiate');
                    }
                    return redirect()->back()->with('global', 'Order not created successfully')->with('type', 'error');
                } else {
                    return redirect()->back()->with('global', 'Select Address Again')->with('type', 'error');
                }
            } catch (\Exception $e) {
                DB::rollback();
                $msg = $e->getMessage();
                $type = 'error';
                return redirect()->back()->with('global', $msg)->with('type', $type);
            }
        } else {
            return redirect()->route('home')->with('global', 'Empty Cart')->with('type', 'warning');
        }
    }

    public function discountCoupon($value = '')
    {
        $done = $this->cartCalculation();
        $request = json_decode(request()->getContent(), true);
        $total = $done['exclTaxTotal'];
        $coupon = \App\UserToken::where('user_id', auth()->user()->id)->where('code', '=', $request['coupon'])->whereDate('expiry_at', '>=', \Carbon::today())->first();
        if ($coupon) {
            if ($coupon->min_cart_amt <= $done['exclTaxTotal']) {
                $this->cart['coupon_id'] = $coupon->id;
                \Session::put('cart', $this->cart);

                if ($coupon->type == 'amt') {

                    $disValue = config('app.lang')->currency . $coupon->value;
                    $total = (int) $total - $coupon->value;
                } elseif ($coupon->type == 'percent') {
                    $disValue = $coupon->value . '%';
                    $total = (int) $total - (($total / 100) * $coupon->value);
                }
                if (config('app.lang')->slug == 'in') {
                    if ($total > 0) {
                        $gst = ($total * 0.18);
                        $total = $total + ($total * 0.18);
                    }
                }
                return response()->json(['type' => 'success', 'couponValue' => $disValue, 'total' => $total, 'msg' => 'Coupon Applied', 'currency' => config('app.lang')->currency]);
            }
            return response()->json(['type' => 'error', 'message' => 'Min Cart Price ' . $coupon->min_cart_amt . ' required']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'Coupon Not Found']);
        }
    }

    public function removeDiscount($value = '')
    {
        $done = $this->cartCalculation();
        $this->cart['coupon_id'] = null;
        \Session::put('cart', $this->cart);
        $disValue = '0';
        return response()->json(['type' => 'success', 'couponValue' => $disValue, 'total' => $done['total']]);
    }
}
