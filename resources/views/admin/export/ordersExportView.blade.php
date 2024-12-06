@forelse($orders as $order)
        <table class="table table-striped table-products-list">
	        <thead class="thead-dark">
	            <tr>
	                <th style="background-color: #04AA6D; color: #FFFFFF;"><b>Order ID</b></th>
					<th style="background-color: #04AA6D; color: #FFFFFF;"><b>Name</b></th>
					<th style="background-color: #04AA6D; color: #FFFFFF;"><b>Region</b></th>
					<th style="background-color: #04AA6D; color: #FFFFFF;"><b>Date</b></th>
					<th style="background-color: #04AA6D; color: #FFFFFF;"><b>Delivery Partner</b></th>
					<th style="background-color: #04AA6D; color: #FFFFFF;"><b>Invoice Amount</b></th>
	            </tr>
	        </thead>
	        <tbody>
		            <tr>
		                <td scope="row" >
								{{$order->invoice_no}}
							
						</td>
						<td>{{$order->user->name}}</td>
						<td>{{$order->language->region}}</td>
						<td>{{Carbon::parse($order->created_at)->format('d-m-Y')}}</td>
						<td>{{@$order->careerPartner->name}}</td>
						<td>{{$order->language->currency}} {{$order->net_amt}}</td>
		            </tr>
	           
	        </tbody>
	    </table>
	    <b>Order Details- {{$order->invoice_no}}</b>
	    <table class="table table-striped table-products-list">
	        <thead>
	            <tr>
	                <!--<th><i class="icon-image4"></i></th>-->
	                <th style="background-color: #E9ECEF; color: #495057;">#</th>
	                <th style="background-color: #E9ECEF; color: #495057;">Name</th>
	                <th style="background-color: #E9ECEF; color: #495057;">Price</th>
	                <th style="background-color: #E9ECEF; color: #495057;">Pieces</th>
	                <th style="background-color: #E9ECEF; color: #495057;">Qty</th>
	                <th style="background-color: #E9ECEF; color: #495057;">Total</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@forelse($order->orderProducts as $key=>$orderProduct)
	        	    
		            <tr>
		                <td scope="row" >{{$key+1}}</td>
		                <td>
		                	{{$orderProduct->stock->product->productDetails()->first()->product_name}}
		                </td>
                        <td>{{@$order->orderProducts()->first()->stock->currency}} {{($orderProduct->price)}}</td>
                        <td>{{$orderProduct->stock->pieces}}</td>
    					<td>{{$orderProduct->qty}}</td>
		                <td class="text-right"><span class="text-semibold">{{@$order->orderProducts()->first()->stock->currency}} {{ $orderProduct->qty * $orderProduct->price * $orderProduct->stock->pieces }}</span></td>	
		            </tr>
	            @empty
	            	<tr><td>No Products Found</td></tr>
	            @endforelse
	        </tbody>
	    </table>
		<table class="table table-subtotal">
			<tbody>
				
				<tr>
				    {{--<td></td>
				    <td></td>--}}
				    <td></td>
				    <td></td>
				    <td></td>
				    <td></td>
					<th style="background-color: #BEE5EB; color: #000000;" ><b>Shipping Charge :</b></th>
					<td class="text-right">{{$order->language->currency}}  {{$order->shipping_charges}}</td>
				</tr>
				<tr>
				    {{--<td></td>
				    <td></td>--}}
				    <td></td>
				    <td></td>
				    <td></td>
				    <td></td>
					<th  style="background-color: #BEE5EB; color: #000000;" ><b>Total(Including shipping charge):</b></th>
					<td class="text-right text-primary"><b class="text-semibold">{{$order->language->currency}} {{$order->net_amt}}</b></td>
				</tr>
			</tbody>
		</table>
				
@empty
	    <table class="table table-striped table-products-list">
	        <thead>
	            <tr>
	                <!--<th><i class="icon-image4"></i></th>-->
	                <th style="background-color: #E9ECEF; color: #495057;">#</th>
	            </tr>
	        </thead>
	        <tbody>
	       
		            <tr>
		                <td scope="row" >No Data Found</td>
		               
		            </tr>
	        </tbody>
	    </table>
				
@endforelse