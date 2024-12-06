<?php

namespace App\Http\Traits;

// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Str, DB, Notification;
use App\Notifications\AdminNotification;
use Carbon\Carbon;
use SoapClient;

trait SlugTrait
{

    public function generateArticleslug($title, $id = 0, $model)
    {
        $slug = Str::slug($title);
        $allSlugs = $this->getRelatedSlugs($slug, $id, $model);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
        throw new Exception('Can not generate a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0, $model)
    {
        return $model::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }
    public function saveSettingData($model, $data, $slug)
    {
        DB::beginTransaction();
        try {
            $name = request('name');
            if (request('value')) $name = request('value');
            // if(!$data->id && $slug){
            // request()->merge([
            //     'slug' => $this->generateArticleslug($name,$data->id,$model),
            // ]); 
            // }
            if ($data) {
            } else {
                $data = new $model;
            }
            $data->fill(@request()->all());
            $data->save();
            DB::commit();
            return ['msg' => 'Saved Successfully', 'type' => 'success'];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function discountType()
    {
        return config('app.discountType');
    }

    public function cartCalculation($value = '')
    {
        $total = 0;
        $exclTaxTotal = 0;
        $stocks = [];
        $totQty = 0;
        $totQty = 0;
        $totdiscountedTotal = 0;
        $totWeight = 0;
        $totWeightDesign = null;
        $discountedTotal = 0;
        $disValue = '';
        $isCoupon = 0;
        $discountedAmount = 0;
        $count = 0;
        $disType = null;
        $max_allowed_discount_percentage = 0;
        $user_discount_percentage = 0;
        $cart = Session::get('cart');
        $demo = false;
        $value = request()->session()->get('lang');
        if (@$value && !is_null($value) && isset($value)) {
            $lanId = $value['id'];
        } else {
            $lanId = config('app.lang')->id;
        }
        if ($cart) {
            $stocks = \App\Stock::whereIn('sku', array_keys($cart))->with(['product', 'product.productDetails' => function ($q) use ($lanId) {
                $q->where('language_id', $lanId);
            }])->get();
            $count = count($stocks);
            foreach ($stocks as $stk) {

                if ($stk->product_id == 15) {
                    $demo = true;
                }
                if (isset($cart[$stk->sku])) {
                    $price = $stk->offer_price * $cart[$stk->sku]['qty'] * $stk->pieces;

                    if ($cart[$stk->sku]['qty'] >= $stk->max_allowed_qty) {
                        $max_allowed_discount_percentage = 5;
                        $price = $price - (($price / 100) * 5);
                        $totdiscountedTotal += round($stk->offer_price * $cart[$stk->sku]['qty'] * $stk->pieces * 0.05);
                    }
                    if (auth()->check() && (auth()->user()->dis_val > 0 || auth()->user()->dis_val != null)) {

                        if (auth()->user()->dis_type == 0) {
                            $user_discount_percentage = auth()->user()->dis_val;

                            $totdiscountedTotal += (($price / 100) * $user_discount_percentage);
                            $price = $price - (($price / 100) * $user_discount_percentage);
                        } else {

                            if (auth()->user()->dis_val < $price) {
                                $user_discount_amount = auth()->user()->dis_val;
                                $totdiscountedTotal += $user_discount_amount;
                                $price = $price - $user_discount_amount;
                            }
                        }
                    }
                    $total += $price;
                    $totQty += $cart[$stk->sku]['qty'] * $stk->pieces;
                }
                $totWeight += $stk->weight * $cart[$stk->sku]['qty'];

                if ($totWeightDesign) {
                    $totWeightDesign = $totWeightDesign . ', ';
                }
                $totWeightDesign .= $stk->weight * $cart[$stk->sku]['qty'];
            }
            // $exclTaxTotal = round(($total/105)*100,2);
            $exclTaxTotal = $total;
        }
        if (@$cart['coupon_id']) {
            $coupon = \App\UserToken::where('user_id', auth()->user()->id)->where('id', '=', $cart['coupon_id'])->whereDate('expiry_at', '>=', \Carbon::today())->first();
            if ($coupon) {
                $isCoupon = 1;
                if ($coupon->min_cart_amt <= $total) {

                    if ($coupon->type == 'amt') {
                        $disValue = $coupon->value;
                        $discountedTotal = (float) $total - $coupon->value;
                        $discountedAmount = $coupon->value;
                        $disType = 'US$';
                    } elseif ($coupon->type == 'percent') {
                        $disValue = $coupon->value;
                        $discountedTotal = (float) $total - (($total / 100) * $coupon->value);
                        $discountedAmount = (($total / 100) * $coupon->value);
                        $disType = '%';
                    }
                }
            } else {
                $isCoupon = 0;
                $discountedTotal = 0;
                $discountedAmount = 0;
                $disValue = null;
                $disType = null;
            }
        }

        $gst = 0;
        if (config('app.lang')->slug == 'in') {

            if ($total > 0) {
                $gst = ($total * 0.18);
                $total = $total + ($total * 0.18);
            }
            if ($discountedTotal > 0) {
                $gst = ($discountedTotal * 0.18);
                $discountedTotal = $discountedTotal + ($discountedTotal * 0.18);
            }
        }
        return ['stocks' => $stocks, 'cartDetails' => $cart, 'gst' => $gst, 'total' => round($total, 2), 'exclTaxTotal' => $exclTaxTotal, 'totQty' => $totQty, 'totWeight' => $totWeight, 'discountedTotal' => $discountedTotal, 'disValue' => $disValue, 'isCoupon' => $isCoupon, 'discountedAmount' => $discountedAmount, 'totdiscountedTotal' => $totdiscountedTotal, 'totWeightDesign' => $totWeightDesign, 'count' => $count, 'disType' => $disType, 'max_allowed_discount_percentage' => $max_allowed_discount_percentage, 'user_discount_percentage' => $user_discount_percentage, 'demo' => $demo];
    }
    public function pendingToConfirmed($oldOrder)
    {
        $latest = \App\Order::latest()->first();
        DB::beginTransaction();
        try {

            $order = \App\Order::create([
                'invoice_no' => $oldOrder->invoice_no,
                'language_id' => $oldOrder->language_id,
                'order_no' => ($latest->order_no + 1),
                'user_id' => $oldOrder->user_id,
                'gstin' => $oldOrder->gstin,
                'company' => $oldOrder->company,
                'gross_amt' => $oldOrder->gross_amt,
                'discount_amt' => $oldOrder->discount_amt,
                'net_amt' => $oldOrder->net_amt,
                'tax_inclusive' => $oldOrder->tax_inclusive,
                'seller_info' => $oldOrder->seller_info,
                'order_type' => $oldOrder->order_type,
                'payment_gateway' => $oldOrder->payment_gateway,
                'online_payment_info' => $oldOrder->online_payment_info,
                'tracking_info' => $oldOrder->tracking_info,
                'status'  => 'Confirmed',
                'name' => $oldOrder->name,
                'email' => $oldOrder->email,
                'contact_no' => $oldOrder->contact_no,
                'house_no' => $oldOrder->house_no,
                'area' => $oldOrder->area,
                'apertment_no' => $oldOrder->apertment_no,
                'landmark' => $oldOrder->landmark,
                'state' => $oldOrder->state,
                'city' => $oldOrder->city,
                'country' => $oldOrder->country,
                'pincode' => $oldOrder->pincode,
                'gstin' => $oldOrder->gstin,
                'full_address' => $oldOrder->full_address,
                'carrier_partner' => $oldOrder->carrier_partner,
                'shipping_charges' => $oldOrder->shipping_charges,
                'shipping_gst' => $oldOrder->shipping_gst,
                'max_allowed_discount_percentage' => $oldOrder->max_allowed_discount_percentage,
                'user_discount_percentage' => $oldOrder->user_discount_percentage,
                'extra_discount' =>  $oldOrder->extra_discount,
                'billing_house_no' => $oldOrder->billing_house_no,
                'billing_apertment_no' => $oldOrder->billing_apertment_no,
                'billing_area' => $oldOrder->billing_area,
                'billing_landmark' => $oldOrder->billing_landmark,
                'billing_city' => $oldOrder->billing_city,
                'billing_country' => $oldOrder->billing_country,
                'billing_state' => $oldOrder->billing_state,
                'billing_pin' => $oldOrder->billing_pin,
                'billing_gstin' => $oldOrder->billing_gstin
            ]);
            foreach (\App\PendingOrderProduct::where('pending_order_id', $oldOrder->id)->get() as $po) {
                \App\OrderProduct::create([
                    'order_id' => $order->id,
                    'stock_id' => $po->stock_id,
                    'product_info' => $po->product_info,
                    'price' => $po->price,
                    'tax_rate' => 0,
                    'qty' => $po->qty,
                    'status' => 'Confirmed'
                ]);
                $po->delete();
            }
            if ($oldOrder->discount_type) {
                \App\UserUsedDiscount::create([
                    'user_id' => $oldOrder->user_id,
                    'discount_type' => $oldOrder->discount_type,
                    'discount_value' => $oldOrder->discount_value,
                    'type' => $oldOrder->type,
                    'min_cart_amt' => $oldOrder->min_cart_amt,
                    'max_cart_amt' => $oldOrder->max_cart_amt,
                    'expiry_at' => $oldOrder->expiry_at,
                    'order_id'  => $order->id
                ]);
            }
            if ($oldOrder->user_token_id) {
                $coupon = \App\UserToken::where('id', '=', $oldOrder->user_token_id)->first();
                $coupon->update(['order_id' => $order->id, 'used_at' => \Carbon\Carbon::now()]);
            }
            DB::commit();
            return ['status' => 'success', 'newOrderId' => $order->id];
        } catch (\Exception $e) {
            DB::rollback();
            return ['status' => 'failed', 'newOrderId' => null, 'msg' => $e->getMessage()];
        }
    }
    function invoiceNumber()
    {
        // $latest = \App\Order::latest()->first();

        // if (! $latest) {
        //     return 'ECOTACT/00001';
        // }

        // $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_no);

        // return 'ECOTACT/' . sprintf('%04d', $string+1);



        // $serial_start = 'OL'.Carbon::today()->format('Ym');



        // $latest = null;
        // $latestPendingOrder = \App\PendingOrder::latest()->first();
        // $latestOrder = \App\Order::latest()->first();

        // if (! $latestPendingOrder && !$latestOrder) {
        //     return $serial_start.'001';
        // }


        // $o_string1 = str_replace($serial_start, '', @$latestPendingOrder->invoice_no);
        // $string1 = preg_replace("/[^0-9\.]/", '', @$o_string1);


        // $o_string2 = str_replace($serial_start, '', @$latestOrder->invoice_no);
        // $string2 = preg_replace("/[^0-9\.]/", '', @$o_string2);

        // // if($string1>$string2){
        // //     $latest = $string1;
        // // }else{
        // //     $latest = $string2;
        // // }
        // $latest = $string2;

        // return $serial_start.sprintf('%03d', $latest+1);
        $latest = \App\Order::latest()->first();
        return 'OL' . Carbon::today()->format('Ym') . ($latest->order_no + 1);
    }
    public function sendAdminNotification($orderId)
    {
        $user = \App\User::find(1);
        $order = \App\Order::find($orderId);
        $body = '';
        if ($order->status == 'Confirmed') {
            $body = 'New Order Placed At Maskare, Invoice No ' . $order->invoice_no;
        } else {
            $body = $order->invoice_no . 'Order Is ' . $order->status;
        }

        $details = [
            'greeting' => 'Hi Admin',
            'body' => $body,
            'thanks' => 'Thank you',
            'actionText' => 'View Orders',
            'actionURL' => route('orders.index', ['OrderStatus' => 'confirmed'])
        ];
        // $user->notify(new AdminNotification($details));
        Notification::send($user, new AdminNotification($details));
        // dd('done');
    }

    public function calculateDelivery($addressId)
    {
        try {
            $newAddress = \App\Address::where('id', $addressId)->first();
            $wsdl = 'http://dhlindiaplugin.com/DHLWCFService_V6/DHLService.svc?singleWsdl';
            $options = array(
                'trace' =>    1,
                'exception' =>  0
            );
            $client = new SoapClient($wsdl, $options);
            $done = $this->cartCalculation();
            $t = $done['discountedTotal'] ? $done['discountedTotal'] : $done['total'];
            $params = array(
                'ShipperPostCode' => 110052,
                'ReceiverCountryCode' => $newAddress->c_code,
                'PostCode' => $newAddress->pin,
                'fromCity' => 'New Delhi',
                'IsDutiable' => 'Y',
                'PickupHours' => 10,
                'PickupMinutes' => 20,
                'DeclaredCurrency' => 'USD',
                'DeclaredValue' => $t,
                'NetworkTypeCode' => 'AL',
                'GlobalProductCode' => 'P',
                'LocalProductCode' => 'P',
                'toCity' => $newAddress->city,
                'PaymentAccountNumber' => 531382651,
                'pieces' => $done['count'],
                'ShipPieceWt' => $done['totWeight'],
                'ShipPieceDepth' => 0,
                'ShipPieceWidth' => 0,
                'ShipPieceHeight' => 0,
            );

            $response = $client->__soapCall("PostQuote_RAS", array($params));
            $convertToJson = (json_encode($response));

            if (strpos($convertToJson, '<\/RemoteAreaSurcharge>') !== false) {
                $firstPos = strpos($convertToJson, '<\/RemoteAreaSurcharge>');
                $firstCut = substr($convertToJson, $firstPos + 23);

                $secondPos = strpos($firstCut, '<\/ShippingCharge>');
                $shippingCharge = substr($firstCut, 0, $secondPos);
                $finalShippingCharge = (float)substr($shippingCharge, 16);


                $thirdPos = strpos($firstCut, '<\/ShippingCharge>');
                $secondCut = substr($firstCut, $thirdPos + 18);

                $fourthPos = strpos($secondCut, '<\/TotalTaxAmount>');
                $taxAmount = substr($secondCut, 0, $fourthPos);
                $finaltaxAmount = (float)substr($taxAmount, 16);
            } else {
                $firstPos = strpos($convertToJson, 'Details');
                $firstCut = substr($convertToJson, $firstPos + 8);

                $secondPos = strpos($firstCut, '<\/ShippingCharge>');
                $shippingCharge = substr($firstCut, 0, $secondPos);
                $finalShippingCharge = (float)substr($shippingCharge, 16);


                $thirdPos = strpos($firstCut, '<\/ShippingCharge>');
                $secondCut = substr($firstCut, $thirdPos + 18);

                $fourthPos = strpos($secondCut, '<\/TotalTaxAmount>');
                $taxAmount = substr($secondCut, 0, $fourthPos);
                $finaltaxAmount = (float)substr($taxAmount, 16);
            }

            if (@$finalShippingCharge > 0) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fastforex.io/convert?api_key=e94969572b-246bbf9d17-r3bojn&from=INR&to=USD&amount=' . $finalShippingCharge,
                    //CURLOPT_URL => 'https://api.fastforex.io/convert?api_key=e94969572b-246bbf9d17-r3bojn&from=INR&to=USD&amount='.$finaltaxAmount,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                Session::put('shipping-charge', 0);
                $obj = json_decode($response);
                if ($obj) {
                    $obj2 = json_decode(json_encode($obj->{"result"}));
                    if ($obj2) {
                        Session::put('shipping-charge', $obj2->{"USD"});
                    } else {
                        Session::put('shipping-charge', 0);
                    }
                } else {
                    Session::put('shipping-charge', 0);
                }
            } else {
                Session::put('shipping-charge', 0);
                return 'error';
            }
        } catch (\Exception $e) {
            return 'error';
        }
    }
}
