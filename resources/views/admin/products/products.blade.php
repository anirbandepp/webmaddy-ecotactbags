@include('admin.adminLayout.header')

<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Products</span> - All Products</h4>
		</div>

		<div class="heading-elements">
			<a href="{{route('products.create')}}" class="btn bg-blue heading-btn"><i class="icon-plus3"></i> Add New Product</a>
		</div>
	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content" ng-app="myApp" ng-controller="mainController" >

	<div class="pr-filters mb15">
		<div class="row">
			<div class="col-lg-3 visible-lg">
				<form class="form-inline" action="{{route('postBulk')}}" method="post">
					@csrf
					<div class="form-group">
						<select class="form-control" name="bulk_option" >
							<option value="">Bulk Option</option>
							<option value="featured">Make Featured</option>
							<option value="active">Make Active</option>
							<option value="publish">Publish</option>
						</select>
					</div>
					<input type="text" name="ids" ng-model="txt" value="" style="display: none;">
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-lg-4 visible-lg">
				<form class="form-inline" action="#" method="get">
					<div class="form-group">
						<input type="text" name="product_name" class="form-control" placeholder="Product name" value="{{$request ? $request->product_name : null}}">
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Search</button>
					</div>
				</form>
			</div>
			<div class="col-lg-5">
				<form class="form-inline pull-right" action="#">
					<div class="form-group">
						{{Form::select('srchCat',['' =>'Filter by Category']+$categories,$request ? $request->srchCat : null,['class' => 'form-control',"onchange" => "this.form.submit()"])}}
					</div>
					<div class="form-group">
						{{Form::select('srchStck',['' => 'Filter by Stock', '1' => 'In-Stock', '0' => 'Out Of Stock'],$request ? $request->srchStck : null,['class' => 'form-control',"onchange" => "this.form.submit()"])}}
					</div>
				</form>
			</div>
		</div>
	</div>

	

	<div class="panel panel-flat">

		<div class="table-responsive ">
			<table class="table table-striped table-products-list" >
				<thead>
					<tr>
						<th>
							<input type="checkbox" style="width: 18px; height: 18px;" ng-model="checkall" ng-click="checkUncheckAll('{{json_encode($products->pluck('id')->all())}}')" ng-checked="checkall">
						</th>
						<th><i class="icon-image4"></i></th>
						<th>Slug</th>
						<th>Stock</th>
						<th>Categories</th>
						<th><i class="icon-star-full2"></i></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse($products as $product)
						<tr>
							<td>
								<label for="{{ $product['id'] }}">
				                    <input type="checkbox" name="selected[]" ng-checked="selection.indexOf({{ $product['id'] }}) > -1" ng-click="toggleSelection({{ $product['id'] }})" value="{{ $product['id'] }}" style="width: 18px; height: 18px;"/>
				                </label>

							</td>
							<td>
								{!!$product->base_img ? '<a href="#"><img src="'.asset('product_images/small/'.$product->base_img).'" class="pr-img"></a>' : '<a href="#"><img src="https://placehold.it/200x200" class="pr-img"></a>'!!}
							</td>
							<td><a href="{{ route('products.edit',$product->id) }}">{{$product->slug}}</a></td>
							<td>{!! $product->stocks_count ? $product->stocks_count : '<span class="text-danger">'.$product->stocks_count.'</span>' !!}</td>
							<td>
								@forelse($product->categories()->select('name','categories.id')->get() as $pCat)
									{{ $loop->first ? '' : ', ' }} <a href="{{route('allCategories',['category'=>$pCat->id])}}">{{$pCat->name}}</a>
								@empty
									<a href="#">No Category Assigned</a>
								@endforelse
							</td>
							<td>
								<div>
									@if($product->featured)
										<i class="icon-star-full2" id="fe{{ $product->id }}" ng-click ="updateproductFeatured('{{route('updateFeaturedProduct',['product' => $product->id])}}',{{ $product->id }},$element.target)" style="cursor: pointer;" data-fe="0"></i>
									@else
										<i class="icon-star-empty3" id="fe{{ $product->id }}" ng-click ="updateproductFeatured('{{route('updateFeaturedProduct',['product' => $product->id])}}',{{ $product->id }},$element.target)" style="cursor: pointer;" data-fe="1"></i>
									@endif
								</div>
							</td>
							<td>
								<ul class="icons-list pull-right">
									<li><a href="{{route('stock.index',['productId' => $product->id])}}" data-popup="tooltip" data-original-title="Stocks"><i class="icon-stack3"></i></a></li>
									<li><a href="{{route('images.index',['productId' => $product->id])}}" data-popup="tooltip" data-original-title="Images"><i class="icon-images3"></i></a></li>
								</ul>
							</td>
						</tr>
					@empty
						<tr>
							<td>No Data Found</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>


	</div>
					
	<ul class="pagination pagination-sm mb30">
	  {{$products->appends($input)->links()}}
	</ul>



	<!-- Footer -->
	@include('admin.adminLayout.copyright')
	<!-- /footer -->
</div>
<!-- /content area -->

@include('admin.adminLayout.footer')