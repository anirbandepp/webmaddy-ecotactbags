<?php include 'header.php' ?>

<!-- Page header -->
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><span class="text-semibold">Coupon Discounts</span> - All Coupons</h4>
		</div>

		<div class="heading-elements">
			<a href="#" class="btn bg-blue heading-btn" data-toggle="modal" data-target="#addDiscountModal"><i class="icon-plus3"></i> Add New Discount</a>
		</div>

	</div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
	<p>Showing Orders for Last 3 months</p>

	<div class="pr-filters mb15">
		<div class="row">
			<div class="col-lg-7 visible-lg">
				<form class="form-inline">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Search by Code">
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">Reset</button>
					</div>	

				</form>
			</div>

			<div class="col-lg-5">
				<form class="form-inline pull-right">
					<div class="form-group">
						<select class="form-control">
							<option>Filter by</option>
							<option>Active</option>
							<option>Inactive</option>
							<option>Expired</option>
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-slate">Submit</button>
					</div>
				</form>
				
			</div>

		</div>
	</div>

	

	<div class="panel panel-flat">

		<div class="table-responsive table-orders">
			<table class="table table-striped table-products-list">
				<thead>
					<tr>
						<th>Code</th>
						<th>Discount</th>
						<th>Min Cart Value</th>
						<th>Expires</th>
						<th>Description</th>
						<th>Active</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<?php for ($i=0; $i < 3; $i++) { ?> 
						
					<tr>
						<td>PROMO20</td>
						<td>20%</td>
						<td>₹500</td>
						<td>13-05-2020 05:30 PM</td>
						<td>20% Off on min purchase of ₹500</td>
						<td><label class="label bg-success-400">YES</label></td>
						<td>
							<a href="#"><i class="icon-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>PROMO20</td>
						<td>₹200</td>
						<td>₹2000</td>
						<td><label class="label bg-orange-400">Expired</label></td>
						<td>20% Off on min purchase of ₹500</td>
						<td><label class="label label-warning">NO</label></td>
						<td>
							<a href="#"><i class="icon-trash"></i></a>
						</td>
					</tr>

					
					<?php } ?>
				</tbody>
			</table>
		</div>


	</div>
					
	<ul class="pagination pagination-sm mb30">
	  <li><a href="#">1</a></li>
	  <li class="active"><a href="#">2</a></li>
	  <li><a href="#">3</a></li>
	  <li><a href="#">4</a></li>
	  <li><a href="#">5</a></li>
	</ul>



	<!-- Footer -->
	<?php include 'copyright.php' ?>
	<!-- /footer -->
</div>
<!-- /content area -->



<!-- Modal -->
<div id="addDiscountModal" class="modal fade " role="dialog">
  <div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content modal-stock">
      <div class="modal-header bg-slate">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Coupon Discount</h4>
      </div>
      <div class="modal-body">
        	
        <form>
        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Code Name</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" class="form-control" name="">
        		</div>
        	</div>
        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Description</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" class="form-control" name="">
        		</div>
        	</div>
        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Discount Value</label>
        		</div>
        		<div class="col-md-4">
        			<input type="text" class="form-control" name="">
        		</div>
        		<div class="col-md-4">
        			<select class="form-control">
        				<option>Percentage</option>
        				<option>Amount</option>
        			</select>
        		</div>
        	</div>

        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Min Cart Value</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" class="form-control" name="">
        		</div>
        	</div>
        	

        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Expires on</label>
        		</div>
        		<div class="col-md-8">
        			<input type="text" class="form-control" name="">
        		</div>
        	</div>


        	<div class="form-group row">
        		<div class="col-md-4">
        			<label>Active</label>
        		</div>
        		<div class="col-md-8">
        			<select class="form-control">
        				<option>YES</option>
        				<option>NO</option>
        			</select>
        		</div>
        	</div>

        </form>	


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Add Discount</button>
      </div>
    </div>
  </div>
</div>



<?php include 'footer.php' ?>