<?php
	namespace App\Repositories;

	use Illuminate\Database\Eloquent\Builder;
	use App\Order,App\PendingOrder;
	class OrderRepository
	{
		protected $orders;
		protected $orderStatus;
		public function __construct(Order $orders,PendingOrder $pendingOrders)
		{
			$this->orders = $orders;
			$this->orderStatus = request()->route('OrderStatus');
			if($this->orderStatus == 'pending'){
				$this->orders = $pendingOrders;
			}elseif($this->orderStatus != 'all'){
				$this->orders = $orders->where('status',$this->orderStatus);
			}
			
		}
		public function allOrders()
	    {
	      	return $this->orders->orderBy('id','desc');
	    }
	    public function orderFindById($id)
	    {
	      	return $this->orders->where('id',$id);
	    }
	    public function srchOrders($request)
	    {
	    	$srchResults = $this->allOrders();
	    	if($request['srchBy']){
	    		$srch_by = $request['srchBy'];
	    		if($request['srch_val']){
		    		$srchResults = $srchResults->where($request['srchBy'],$request['srch_val']);
		    	}
	    	}
	    	return $srchResults;
	    }

	    public function orderDetail($id)
	    {
	    	$orderDetail = $this->orderFindById($id)->with(
                ['user','orderProducts' => function($query) 
                {
                    $query->with(['stock'=> function($query) 
                    {
                        $query->with('product');
                    }]);
                }
            ]);
	    	if($this->orderStatus != 'pending'){
	    		return $orderDetail = $this->orderFindById($id)->with(['userUsedDiscounts'])->first();
	    	}
	    	return $orderDetail = $orderDetail->first();
	    }
	}