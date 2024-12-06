<?php
	namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Routing\middleware;

	use Illuminate\Database\Eloquent\Builder;
	use App\CartDiscount,App\CouponDiscount,App\CategoryDiscount;

	class DiscountRepository
	{
		protected $discountType;
		protected $model;
	    public function __construct(CartDiscount $cartDiscount,CouponDiscount $couponDiscount, CategoryDiscount $categoryDiscount)
	    {
	        $this->discountType = request()->route('discountType');
	        if($this->discountType == 'cart'){
	            $this->discounts = $cartDiscount;
	            $this->model = '\App\CartDiscount';
	        }elseif($this->discountType == 'coupon'){
	            $this->discounts = $couponDiscount;
	            $this->model = '\App\CouponDiscount';
	        }
	        
	    }
	    public function allDiscounts($request)
	    {
	    	$discounts = $this->discounts;
	    	if($request['name'])
	    	{
	    		$discounts = $discounts->where('name','like','%'.$request['name'].'%');
	    	}
	    	if($request['filter'])
	    	{
	    		if($request['filter'] == 'active') 
	    			$discounts = $discounts->where('active',1);
	    		elseif($request['filter'] == 'inactive') 
	    			$discounts = $discounts->where('active',0);
	    		elseif ($request['filter'] == 'expired') {
	    			$discounts = $discounts->whereDate('expiry_at','<',Carbon::today());
	    		}
	    	}
	    	return $discounts;
	    }
	    public function findbyId($id)
	    {
	    	return $discounts = $this->discounts->where('id',$id);
	    }
	    public function getModel()
		{
		    return $this->model;
		}
	}
