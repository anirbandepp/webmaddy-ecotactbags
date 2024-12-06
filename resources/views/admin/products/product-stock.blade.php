@include('admin.adminLayout.header')

<style>
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #efebeb;
    opacity: 1;
}

</style>
<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Stocks</span> - {{config('app.product')->slug}}</h4>
		</div>
		<div class="heading-elements">
			<a href="#" class="btn bg-blue heading-btn" data-toggle="modal" data-target="#addStockModal"><i class="icon-plus3"></i> Add Stock</a>
		</div>
	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

	<div class="row">
		<div class="col-md-7 visible-lg visible-md">
            {!!config('app.product')->base_img ? '<img src="'.asset('product_images/small/'.config('app.product')->base_img).'" class="img-responsive img-pr-img-sm">' : '<img src="https://placehold.it/200x200" class="img-responsive img-pr-img-sm">'!!}
        </div>
        <div class="col-md-5">
         <div class="mb15 pull-right">
          <a href="{{route('images.index',['productId' => config('app.product')->id])}}" class="btn btn-sm border-slate text-slate-600 btn-flat"><i class="icon-images3 position-left"></i> Manage Pictures</a>
          <a href="{{ route('products.edit',config('app.product')->id) }}" class="btn btn-sm border-slate text-slate-600 btn-flat">Edit Product</a>
      </div>
  </div>
</div>



<div class="panel panel-flat">
    <div class="table-responsive ">
        <table class="table table-striped table-stocks">
            <thead>
                <tr>
                    <th>Language</th>
                    {{-- <th>Currency</th> --}}
                    <th>Weight</th>
                    <!--<th>Details</th>-->
                    <th>Pieces</th>
                    <th>Size Tag</th>
                    <th>Max Qty</th>
                       {{--  <th>SKU</th>
                       <th>HSN</th> --}}
                       <th style="width: 10%;">Size</th>
                        {{-- <th>Regular Price (₹)</th>
                        <th>Offer Price (₹)</th> --}}
                        <th>Price</th>
                        {{-- <th>Stock Qty </th> --}}
                        {{-- <th>Out of Stock Qty</th>
                        <th>Real-time Stock</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stocks as $stock)
                    <tr>
                        <form id="edStk{{$stock->id}}">
                            @csrf
                            <td>
                                <span id="oldLanguage{{$stock->id}}">{{@$stock->language->slug}}</span>
                                {{Form::select('newLanguage',[]+$languages,@$stock->language_id,['id'=>'newLanguage'.$stock->id,'class'=> 'form-control','style' => 'display:none; height:34px'])}}              
                            </td>
                                {{-- <td>
                                    <span id="stkCurrency{{$stock->id}}">{{$stock->currency}}</span>               
                                </td> --}}
                                <td>
                                    <input type="text" class="form-control" name="weight{{$stock->id}}" title="Please enter without ' " value="{{$stock->weight}}" id="weight{{$stock->id}}" readonly="readonly">                  
                                </td>
                                {{--<td>
                                    <input type="text" class="form-control" name="ship_piece_width{{$stock->id}}" title="Please enter without ' " value="{{$stock->ship_piece_width}}" id="ship_piece_width{{$stock->id}}" readonly="readonly" placeholder="Width"> <br>
                                    <input type="text" class="form-control" name="ship_piece_height{{$stock->id}}" title="Please enter without ' " value="{{$stock->ship_piece_height}}" id="ship_piece_height{{$stock->id}}" readonly="readonly" placeholder="Height"> <br>
                                    <input type="text" class="form-control" name="ship_piece_depth{{$stock->id}}" title="Please enter without ' " value="{{$stock->ship_piece_depth}}" id="ship_piece_depth{{$stock->id}}" readonly="readonly" placeholder="Depth"> 
                                </td>--}}
                                <td>
                                    <input type="text" class="form-control" name="pieces{{$stock->id}}" title="Please enter without ' " value="{{$stock->pieces}}" id="pieces{{$stock->id}}" readonly="readonly">                  
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="size_tag{{$stock->id}}" title="Please enter without ' {{$stock->size_tag}}" value="{{$stock->size_tag}}" id="size_tag{{$stock->id}}" readonly="readonly">                  
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="max_allowed_qty{{$stock->id}}" title="Please enter without ' " value="{{$stock->max_allowed_qty}}" id="max_allowed_qty{{$stock->id}}" readonly="readonly">                  
                                </td>
                                {{-- <td>
                                    <input type="text" name="sku{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->sku}}" class="form-control" id="sku{{$stock->id}}" readonly="readonly">               
                                </td> --}}
                                {{-- <td>
                                    <input type="text" name="hsn{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->hsn}}" class="form-control" id="hsn{{$stock->id}}" readonly="readonly">                  
                                </td> --}}
                                <td>
                                    <span id="oldSize{{$stock->id}}">{{@$stock->size}}</span>
                                    {{Form::select('newSize',[]+$sizes,@$stock->size_id,['id'=>'newSize'.$stock->id,'class'=> 'form-control','style' => 'display:none; height:34px'])}}           
                                </td>
                                {{-- <td>
                                    <input type="text" class="form-control" name="oldPrice{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->regular_price}}" id="oldPrice{{$stock->id}}" readonly="readonly">                  
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="newPrice{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->offer_price}}" id="newPrice{{$stock->id}}" readonly="readonly">                  
                                </td> --}}
                                <td>
                                    <input type="text" class="form-control" name="oldPrice{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->regular_price}}" id="oldPrice{{$stock->id}}" readonly="readonly">                  
                                </td>
                                {{-- <td>
                                    <input type="text" class="form-control" id="oldQty{{$stock->id}}" disabled value="{{$stock->qty}}">
                                    <div class="form-group" style="display: none;" id="newQty{{$stock->id}}">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="sign{{$stock->id}}" value="+" style="text-align: center;">
                                                <input type="text" class="form-control" placeholder="Ex. +50, -50" name="stockIncrease{{$stock->id}}" id="newStk{{$stock->id}}">
                                                <span class="input-group-addon" id="oldQtySpan{{$stock->id}}">{{$stock->qty}}</span>
                                            </div>
                                        </div>
                                    </div>               
                                </td>
                                <td><input type="text" name="outOfStock{{$stock->id}}" pattern="[^':]*$" title="Please enter without ' " value="{{$stock->empty_qty}}" class="form-control" id="outOfStock{{$stock->id}}" readonly="readonly"></td>
                                <td><span id="realStk{{$stock->id}}">{{$stock->remaining_qty}}</span></td> --}}
                                <td>
                                 <a href="javascript:void(0)" id="editStock{{$stock->id}}" onclick="startSave({{$stock->id}})" title="Edit"><i class="icon-pencil4"></i></a>
                                 <a href="javascript:void(0)" style="display:none;" onclick="saveStock('{{$stock->id}}','{{route('stock.update',['productId'=> config('app.product')->id, 'stock' => $stock->id])}}')" id="saveStock{{$stock->id}}" data-popup="tooltip" title="Save"><i class="icon-floppy-disk"></i></a>
                                 <i class="icon-spinner9 spinner" id="loading{{$stock->id}}" style="display: none;"></i>
                             </td>
                         </form>
                     </tr>

                     @empty
                     <tr><td>No Stocks Found</td></tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>






     <!-- Footer -->
     @include('admin.adminLayout.copyright')
     <!-- /footer -->

 </div>
 <!-- /content area -->

 <!-- Modal -->
 <div id="addStockModal" class="modal fade " role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content modal-stock">
        <div class="modal-header bg-slate">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Stock</h4>
        </div>

        <form action="{{route('stock.store',['productId'=> config('app.product')->id])}}" method="post" id="addStk">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Select Size</label>
                    </div>
                    <div class="col-md-8">
                        {{Form::select('size_id',[]+$sizes,old('size_id'),['class'=> 'form-control'])}} 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Language</label>
                    </div>
                    <div class="col-md-8">
                        {{Form::select('language_id',[]+$languages,old('language_id'),['class'=> 'form-control'])}} 
                    </div>
                </div>
                    {{-- <div class="form-group row">
                        <div class="col-md-4">
                            <label>SKU</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="sku" pattern="[^':]*$" title="Please enter without ' " value="{{old('sku')}}" class="form-control">  
                        </div>
                    </div> --}}

                {{-- <div class="form-group row">
                    <div class="col-md-4">
                        <label>HSN</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="hsn" pattern="[^':]*$" title="Please enter without ' " value="{{old('hsn')}}" class="form-control">  
                    </div>
                </div> --}}

            	{{-- <div class="form-group row">
            		<div class="col-md-4">
            			<label>Regular Price (₹)</label>
            		</div>
            		<div class="col-md-8">
            			<input type="text" name="regular_price" value="{{old('regular_price') ? old('regular_price') : 0 }}" class="form-control">  
            		</div>
            	</div>
            	<div class="form-group row">
            		<div class="col-md-4">
            			<label>Offer Price (₹)</label>
            		</div>
            		<div class="col-md-8">
            			<input type="text" name="offer_price" value="{{old('offer_price')}}" class="form-control">  
            		</div>
            	</div> --}}
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Price (₹)</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="price" value="{{old('price')}}" class="form-control">  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Weight</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="weight" value="{{old('weight')}}" class="form-control">  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Pieces</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="pieces" value="{{old('pieces')}}" class="form-control">  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label>Size Tag</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="size_tag" value="{{old('size_tag')}}" class="form-control">  
                    </div>
                </div>
                <div class="form-group row">
                      <div class="col-md-4">
                       <label>Max Allowed Qty</label>
                   </div>
                   <div class="col-md-8">
                       <input type="text" name="max_allowed_qty" value="{{old('max_allowed_qty')}}" class="form-control">  
                   </div>
               </div>

                {{-- <div class="form-group row">
                      <div class="col-md-4">
                       <label>Stock Qty</label>
                   </div>
                   <div class="col-md-8">
                       <input type="text" name="qty" value="{{old('qty')}}" class="form-control">  
                   </div>
               </div> --}}

            	{{-- <div class="form-group row">
            		<div class="col-md-4">
            			<label>Out of Stock Qty</label>
            		</div>
            		<div class="col-md-8">
            			<input type="text" name="empty_qty"  value="{{old('empty_qty')}}" class="form-control">  
            		</div>
            	</div> --}}	
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Stock</button>
            </div>
        </form>
    </div>

</div>
</div>

@include('admin.adminLayout.footer')