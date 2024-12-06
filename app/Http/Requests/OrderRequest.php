<?php

namespace App\Http\Requests;

use App\DeliveryService;
use App\Http\Traits\SlugTrait;
use App\Repositories\OrderRepository;
use DB,PDF,Mail;
use App\Order;
use Illuminate\Foundation\Http\FormRequest;
use SoapClient,SoapHeader;
use NumberFormatter;
use Illuminate\Support\Str;

class OrderRequest extends FormRequest
{
    use SlugTrait;
    private $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tracking_service' => 'required|sometimes',
            'trackingNumber' => 'required|sometimes',
            'status' => 'required|sometimes',
            'breadth' => 'required|sometimes',
            'count' => 'required|sometimes',
            'height' => 'required|sometimes',
            'length' => 'required|sometimes',
            'pickdate' => 'required|sometimes',
            'time' => 'required|sometimes',

        ];
    }
    public function OrderUpdate($id)
    {
        DB::beginTransaction();
        try{
            $msg = "Updated Successfully";
            $type = "success";
            $order = $this->orderRepository->orderFindById($id)->first();
            if($order->status == 'Pending')
            {
                $pToc = $this->pendingToConfirmed($order);
                if($pToc['status'] == 'success')
                {
                    $order = \App\Order::find($pToc['newOrderId']);
                    if($order->language_id == 4){
                        $curr = '₹';
                    }else{
                       $curr = '$';
                    }
                    $lang = \App\Language::where('id',$order->language_id)->first();
                    config(['app.lang' => $lang]);
                    $orderDetails = $order->load(
                        ['userUsedDiscounts','user','orderProducts' => function($query)
                            {
                                $query->with(['stock'=> function($query)
                                {
                                    $query->with('product');
                                }]);
                            }
                        ]);
                    $email = [$order->email];
                        // $email2 = ['swarnadeep@webmaddy.com'];
                        $email2 = ['info@ecotactbags.com', 'aashirvad@gmail.com'];
                    $subject = 'Your order has been placed and confirmed by Ecotact bags';
                    $heading = "Order Successfully Placed";
                        $heading2 = "New Order Placed";
                    $wrd = $this->amountToWord($order->net_amt,$curr);
                        view()->share(['order'=>$orderDetails,'wrd' => $wrd]);
                    $pdf = PDF::loadview('invoice');
                    Mail::send('confirm_mail', ['order' => $order,'heading' => $heading], function ($m) use ($email,$subject,$pdf) {
                        $m->to($email)->subject($subject);
                        $m->attachData($pdf->output(), 'invoice.pdf');
                    });
                    Mail::send('confirm_mail', ['order' => $order,'heading' => $heading2], function ($m) use ($email2,$subject,$pdf) {
                        $m->to($email2)->subject($subject);
                        $m->attachData($pdf->output(), 'invoice.pdf');
                    });
                    // $this->orderUpdateMail($order,$order->user->email,'Your order has been placed and confirmed by Ecotact bags');
                    //$order->delete();
                }
            }else
            {
                if(request('tracking_service') && request('trackingNumber'))
                {
                    $service = DeliveryService::findorFail(request('tracking_service'));
                    $order->tracking_info = $service->tracking_url.'/'.request('trackingNumber');
                }
                if(request('status')){
                    if(request('status') == 'Shipped')
                    {
                        // if($order->tracking_info){
                            $order->update(['status' => 'Shipped']);
                            if($order->carrier_partner == 4)
                            {
                                $this->dhlImplementation($order->id);
                            }
                            if($order->carrier_partner == 5)
                            {
                                $done = $this->bluedartImplementation($order->id);
                                if($done['type'] == 'success'){
                                    $order->tracking_info = $done['tracking_info'];
                                    $order->awb_no = $done['tracking_info'];
                                    $order->carier_response = $done['carier_response'];
                                    $order->save();
                                }
                            }
                            $order = $this->orderRepository->orderFindById($id)->first();
                            $type = 'success';
                            $this->orderUpdateMail($order,$order->user->email,'Your Order is '.$order->status);
                            //$this->sendAdminNotification($order->id);
                        // }else{
                        //     $msg = "Order does not have tracking url";
                        //     $type = "warning";
                        // }
                    }else{
                        $order->status = request('status');
                        $this->orderUpdateMail($order,$order->user->email,'Your Order is '.$order->status);
                    }
                    
                }
                $order->save();
            }
            DB::commit();
            return ['msg' => $msg, 'type' => $type,'orderStatus' => $order->status,'orderId' => $order->id];
        }catch(\Exception $e){
            DB::rollback();
            $msg = $e->getMessage();
            $type = "error";
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function OrdersUpdate()
    {
        DB::beginTransaction();
        try{
            if(request('bulk_option') && request('ids'))
            {
                $ids = array_map('intval', explode(',', request('ids')));
                foreach($ids as $id){
                    $order = $this->orderRepository->orderFindById($id)->first();
                    if(config('app.orderStatus') == 'pending')
                    {
                        $pToc = $this->pendingToConfirmed($order);
                        if($pToc['status'] == 'success')
                        {
                            $this->orderUpdateMail($order,$order->user->email,'Your Order is confirmed');
                            $order->delete();
                        }
                    }else{
                        $order->update(['status' => request('bulk_option')]);
                    }
                }
                DB::commit();
                $msg = "Updated Successfully";
                $type = "success";
                return ['msg' => $msg, 'type' => $type];
            }else{
                $msg = "Something Wrong";
                $type = "error";
                return ['msg' => $msg, 'type' => $type];
            }
        }
        catch(\Exception $e){
            DB::rollback();
            $msg = $e->getMessage();
            $type = "error";
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function orderUpdateMail($order,$email,$subject)
    {
        $orderProduct = \App\OrderProduct::where('order_id',$order->id)->first();
        $wrd = $this->amountToWord($order->net_amt,$orderProduct->stock->currency);
        try {
            \Mail::send('order_tracking_mail', ['order' => $order,'heading' => $subject,'wrd' => $wrd], function ($m) use ($email,$subject) {
                $m->to(['raju@webmaddy.com',$email])->subject($subject);
            });
            //   \Mail::send('order_tracking_mail', ['order' => $order,'heading' => $subject], function ($m) use ($email,$subject) {
            //     $m->to($email)->subject($subject);
            //   });
        }
        catch(\Exception $e){
            return $e->getmessage();
        }
        
    }
     public function amountToWord($num,$curr)
    {
        $num = $num;
    
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $no = floor($num);
        
        $part_1 = $f->format($no);
         
        $point= number_format($num - $no,2)* 100;
        
        $part_2 = $f->format($point);
        
        if($curr == '$'){
            return ucwords('US Dollars '. $part_1 . ' and  ' .$part_2.' cents');
        }else{
            return ucwords($part_1 . ' rupees and ' .$part_2.' paise');
        }
        
        $number = $num;
        $no = floor($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
            } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $points = ($point) ?
            "." . $words[$point / 10] . " " . 
                  $words[$point = $point % 10] : '';
        //return $result . "US Dollars  " . $points ;
        if($curr == '$'){
            return "US Dollars (".ucwords($result).")";
        }else{
            return ucwords($result);
        }
        
    }
    
    
    public function dhlImplementation($orderId){
        $order = \App\Order::find($orderId);
        if($order){
            $orderProducts = \App\OrderProduct::where('order_id',$order->id)->get();
            $shipContents  = $serialNumber = $qty = $weight = $shipPieceUOM = $ShipPieceCESS = $hsCode = $CommodityType ='';
            $totalWeight = 0;
            
            $_country = '';
            $_countryFull = '';
            $_FOBValue = '';
            $_Description = '';
            $invoiceRatePerUnit = '';
            $IsUnderMEISScheme = '';
            foreach($orderProducts as $key => $orderProduct)
            {
                if($key > 0 && $key != count($orderProducts) ){
                    $_country = $_country.',';
                    $_countryFull = $_countryFull.',';
                    $shipContents = $shipContents.',';
                    $serialNumber = $serialNumber.',';
                    $_FOBValue = $_FOBValue.',';
                    $_Description = $_Description.',';
                    $qty = $qty.',';
                    $weight = $weight.',';
                    $invoiceRatePerUnit = $invoiceRatePerUnit.',';
                    $shipPieceUOM = $shipPieceUOM.',';
                    $ShipPieceCESS = $ShipPieceCESS.',';
                    $hsCode = $hsCode.',';
                    $CommodityType = $CommodityType.',';
                    $IsUnderMEISScheme = $IsUnderMEISScheme.',';
                }
                $_country = $_country.'IN';
                $_countryFull = $_countryFull."INDIA";
                $shipContents = $shipContents.$orderProduct->stock->product->productDetails[0]['product_name'];
                $serialNumber = $serialNumber.($key+1);
                $_FOBValue = $_FOBValue.'100';
                $_Description = $_Description.'1'.$orderProduct->stock->product->productDetails[0]['product_name'];
                $qty = $qty.($orderProduct->qty * $orderProduct->stock->pieces);
                $weight = $weight.'1';
                
                $invoiceRatePerUnit = $invoiceRatePerUnit. $orderProduct->stock->offer_price;
                $shipPieceUOM = $shipPieceUOM.'PCS';
                $ShipPieceCESS = $ShipPieceCESS.'0';
                $hsCode = $hsCode.'44209090';
                $CommodityType = $CommodityType.'Others';
                $IsUnderMEISScheme = $IsUnderMEISScheme.'0';
                
                
                $totalWeight +=  $orderProduct->stock->weight;
                
                $wsdl = 'http://dhlindiaplugin.com/DHLWCFService_V6/DHLService.svc?singleWsdl';
                $client = new SoapClient($wsdl, array('trace' => 1, "exception" => 0));
                
                $DutiableDeclaredvalue = $order->net_amt;
            
                
                $params = array(
                    "Shipmentpurpose" => "CSBV",
                     "ShipperAccNumber" => "531382651",
                     "ShippingPaymentType" => "S",
                     "BillingAccNumber" => "531382651",
                     "ConsigneeCompName" => "Receiver Company Name",
                     "ConsigneeAddLine1" => $order->full_address ? $order->full_address : ($order->house_no.','.$order->area.','.$order->apertment_no.','.$order->landmark),
                     "ConsigneeAddLine2" => "Receiver address 2",
                     "ConsigneeAddLine3" => "",
                     "ConsigneeCity" => $order->city ? $order->city : '',
                     "ConsigneeDivCode" => "NY",
                     "PostalCode" => "10018",
                     "ConsigneeCountryCode" => "US",
                     "ConsigneeCountryName" => "United States",
                     "ConsigneeName" => $order->name,
                     "ConsigneePh" => $order->contact_no,
                     "ConsigneeEmail" => $order->email,
                     "RegistrationNumber" => "",
                     "RegistrationNumberTypeCode" => "",
                     "RegistrationNumberIssuerCountryCode" => "",
                     "BusinessPartyTypeCode" => "",
                     "ShipCurrencyCode" => "USD",
                     "ShipPieceWt" => "4",
                     "ShipPieceDepth" => "10",
                     "ShipPieceWidth" => "10",
                     "ShipPieceHeight" => "10",
                     "ShipGlobalProductCode" => "P",
                     "ShipLocalProductCode" => "P",
                     "ShipperId" => "AASHIRVAD",
                     "ShipperCompName" => "AASHIRVAD INTERNATIONAL",
                     "ShipperAddress1" => "NO. 18, UGF, BLOCK C-2",
                     "ShipperAddress2" => "ASHOK VIHAR PHASE-2",
                     "ShipperAddress3" => "",
                     "ShipperCountryCode" => "IN",
                     "ShipperCountryName" => "INDIA",
                     "ShipperCity" => "NEW DELHI",
                     "ShipperPostalCode" => "110052",
                     "ShipperPhoneNumber" => "01147028340",
                     "SiteId" => "v62_20fc7KglZA",
                     "Password" => "PFk5CdXG6G",
                     "ShipperName" => "NAVNEET JAIN",
                     "ShipperRef" => "Order No. / PO No. / Reference No.",
                     "ShipperRegistrationNumber" => "",
                     "ShipperRegistrationNumberTypeCode" => "",
                     "ShipperRegistrationNumberIssuerCountryCode" => "",
                     "ShipperBusinessPartyTypeCode" => "",
                     "BillToCompanyName" => "",
                     "BillToContactName" => "",
                     "BillToAddressLine1" => "",
                     "BillToCity" => "",
                     "BillToPostcode" => "",
                     "BillToSuburb" => "",
                     "BillToState" => "",
                     "BillToCountryName" => "",
                     "BillToCountryCode" => "",
                     "BillToPhoneNumber" => "",
                     "IECNo" => "1234567890",
                     "TermsOfTrade" => "DAP",
                     "Usingecommerce" => "1",
                     "GSTIN" => "27AAECT9293M1ZH",
                     "GSTInvNo" => "",
                     "GSTInvNoDate" => "",
                     "NonGSTInvNo" => "INV TEST DT 2021/033",
                     "NonGSTInvDate" => "2021-09-21",
                     "IsUsingIGST" => "NO",
                     "UsingBondorUT" => "YES",
                     "BankADCode" => "12345AE891234T",
                     "Exporter_CompanyName" => "",
                     "Exporter_AddressLine1" => "",
                     "Exporter_AddressLine2" => "",
                     "Exporter_AddressLine3" => "",
                     "Exporter_City" => "",
                     "Exporter_DivisionCode" => "",
                     "Exporter_PostalCode" => "",
                     "Exporter_CountryCode" => "",
                     "Exporter_CountryName" => "",
                     "Exporter_PersonName" => "",
                     "Exporter_PhoneNumber" => "",
                     "Exporter_Email" => "",
                     "Exporter_RegistrationNumber" => "",
                     "Exporter_RegistrationNumberTypeCode" => "",
                     "Exporter_RegistrationNumberIssuerCountryCode" => "",
                     "Exporter_BusinessPartyTypeCode" => "",
                     "UseDHLInvoice" => "Y",
                     "SignatureName" => "",
                     "SignatureTitle" => "",
                     "LicenseNumber" => "",
                     "ExpiryDate" => "",
                     "DutiableDeclaredCurrency" => "INR",
                     "ShipNumberOfPieces" => "1",
                     
                     "IsUnderMEISScheme" => $IsUnderMEISScheme,
                     "ShipContents" => $shipContents,
                     "ManufactureCountryCode" => $_country,
                     "ManufactureCountryName" => $_countryFull,
                     "DutiableDeclaredvalue" => $DutiableDeclaredvalue,
                     "SerialNumber" => $serialNumber,
                     "FOBValue" => $_FOBValue,
                     "Discount" => "0",
                     "Description" => $_Description,
                     "Qty" => $qty,
                     "Weight" => $weight,
                     "HSCode" => $hsCode,
                     "CommodityCode" => "",
                     "CommodityType" => $CommodityType,
                     "InvoiceRatePerUnit" => $invoiceRatePerUnit,
                     "ShipPieceUOM" => $shipPieceUOM,
                     "ShipPieceCESS" => $ShipPieceCESS,
                     "ShipPieceIGSTPercentage" => "",
                     "ShipPieceIGST" => "",
                     "ShipPieceTaxableValue" => $invoiceRatePerUnit,
                     
                     "FreightCharge" => "",
                     "InsuranceCharge" => "",
                     "TotalIGST" => "",
                     "CessCharge" => "",
                     "ReverseCharge" => "",
                     "PayerGSTVAT" => "",
                     "IsResponseRequired" => "N",
                     "LabelReq" => "N",
                     "SpecialService" => "DS",
                     "InsuredAmount" => "0",
                     "Invoicevalueinword" => "",
                     "Placeofsupply" => "New Delhi",
                     "dateofsupply" => "2021-10-21",
                     "Shipperstatecode" => "07",
                     "ShipperstateName" => "Delhi",
                     "isIndemnityClauseRead" => "YES",
                     "ACCOUNT_NO" => "531382651",
                     "NFEI_FLAG" => "NO",
                     "GOV_NONGOV_TYPE" => "P",
                     "CustomerBarcodeCode" => "",
                     "CustomerBarcodeText" => ""
                );
                
                
                // return $params;
                $response = $client->__soapCall("PostShipment_CSBV", array($params));
                $order->update(['carier_response' => json_encode($response)]);
                $str = json_encode($response);
                $pos1 = strpos($str,"Invoice_");
                $nwstr = substr($str, $pos1+8);
                $awbNo = str_replace(".pdf\"}","",$nwstr);
                
                $order->update(['tracking_info' => "https://www.dhl.com/us-en/home/tracking/tracking-express.html?submit=1&tracking-id=".$awbNo]);
                
            }
        }
    }
    
    public function bluedartImplementation($orderId){
        
        $order = Order::find($orderId);
    
        $wsdl='https://netconnect.bluedart.com/Ver1.10/Demo/ShippingAPI/WayBill/WayBillGeneration.svc?wsdl';
        $options = array(
            'trace'   => 1,  
            'style'   => SOAP_DOCUMENT,
            'use'   => SOAP_LITERAL,
            'soap_version'  => SOAP_1_2
        );
        $client = new SoapClient($wsdl, $options);
        $client->__setLocation("https://netconnect.bluedart.com/Ver1.10/Demo/ShippingAPI/WayBill/WayBillGeneration.svc?wsdl");
        $client->sendRequest = true;
        $client->printRequest = false;
        $client->formatXML = true;
        $actionHeader = new SoapHeader('http://www.w3.org/2005/08/addressing','Action','http://tempuri.org/IWayBillGeneration/GenerateWayBill',true);
        $client->__setSoapHeaders($actionHeader);
        $params = 
        array(
            'Request' =>    
            array (
                'Consignee' =>  
                array (
                    'ConsigneeAddress1' => $order->full_address ? $order->full_address : ($order->house_no.','.$order->area.','.$order->apertment_no.','.$order->landmark),
                    'ConsigneeAddress2' => '',
                    'ConsigneeAddress3'=> '',
                    'ConsigneeAttention'=> $order->name,
                    'ConsigneeMobile'=> $order->contact_no,
                    'ConsigneeName'=> $order->name,
                    'ConsigneePincode'=> $order->pincode,
                    'ConsigneeTelephone'=> '',
                ),
                'Services' => 
                array (
                    'ActualWeight' => '1',
                    'CollectableAmount' => '0',
                    'Commodity' =>
                    array (
                        'CommodityDetail1' => 'PRETTYSECRETS Dark Blue  Allure',
                        'CommodityDetail2'  => ' Aultra Boost Mutltiway Push Up ',                      
                        'CommodityDetail3' => 'Book'
                    ),
                    'CreditReferenceNo' => Str::random(10),
                    'DeclaredValue' => '1000',
                    'Dimensions' =>
                    array (
                        'Dimension' =>
                        array (
                            'Breadth' => request('breadth'),
                            'Count' => request('count'),
                            'Height' => request('height'),
                            'Length' => request('length'),
                        ),
                    ),
                    'InvoiceNo' => '',
                    'PackType' => '',
                    'PickupDate' => request('pickdate'),
                    'PickupTime' => request('time'),
                    'PieceCount' => request('count'),
                    'ProductCode' => 'D',
                    'ProductType' => 'Dutiables',
                    'SpecialInstruction' => '1',
                    'SubProductCode' => ''
                ),
                'Shipper' =>
                array(
                    'CustomerAddress1' => 'NO. 18, UGF, BLOCK C-2',
                    'CustomerAddress2' => 'ASHOK VIHAR PHASE-2',
                    'CustomerAddress3' => '',
                    'CustomerCode' => '977896',
                    'CustomerEmailID' => 'a@b.com',
                    'CustomerMobile' => '1234567890',
                    'CustomerName' => 'AASHIRVAD INTERNATIONAL',
                    'CustomerPincode' => '110001',
                    'CustomerTelephone' => '1234567890',
                    'IsToPayCustomer' => '',
                    'OriginArea' => 'DEL',
                    'Sender' => '1',
                    'VendorCode' => ''
                )
            ),
            'Profile' => 
            array(
                'Api_type' => 'S',
                'LicenceKey'=>'qqji2ishopemteifegnqiofhmhpiqf4g',
                'LoginID'=>'DEL20577',
                'Version'=>'1.3'
            )
        );
        $result = $client->__soapCall('GenerateWayBill',array($params));
        if($result->GenerateWayBillResult->IsError){
            return ['type' => 'error']; 
        }else{
            $awbno=$result->GenerateWayBillResult->AWBNo;    
            return ['type' => 'success','tracking_info'=>$awbno,'carier_response' => json_encode($result)];  
            
        }
    
        
    }
}