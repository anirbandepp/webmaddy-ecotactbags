<?php
	namespace App\Repositories;

	use Illuminate\Database\Eloquent\Builder;
	use App\Product;
	class ProductRepository
	{
		protected $products;
		public function __construct(Product $products)
		{
			$this->products = $products;
		}
		public function all()
	    {
	      	return $this->products->where('active',1)->orderBy('priority','asc');
	    }
	    public function findById()
	    {
	      	return $this->products->with(['categories' => function ($q) {
                $q->select('categories.id');
            } ,'tags'  => function ($q) {
                $q->select('tags.id');
            }]);
	    }
	    public function srchProduct($request)
	    {
	    	$srchResults = $this->products;
	    	if($request['product_name']){
	    	    $productDetails = \App\ProductDetail::where('product_name','like','%'.$request['product_name'].'%')->pluck('product_id')->all();
	    		$srchResults = $srchResults->whereIn('id',$productDetails);
	    	}
	    	if($request['srchCat']){
	    		$cat = $request['srchCat'];
	    		$srchResults = $srchResults->whereHas('categories', function (Builder $query) use($cat) {
				    $query->where('categories.id', 2);
				});
	    	}
	    	if($request->has('srchStck') && $request['srchStck'] != null ){
	    		$stk = $request['srchStck'];
	    		if($stk == 1){
	    			$q = '>=';
	    		}
	    		if($stk == 0){
	    			$q = '<=';
	    		}
	    		$srchResults = $srchResults->whereHas('stocks', function (Builder $query) use($q,$stk) {
				    $query->where('qty',$q,$stk);
				});
	    	}
	    	return $srchResults;

	    }
	    public function findByName($name)
	    {
	      	return $this->products->where('name','like','%'.$name.'%');
	    }
	    public function findByCategory($category)
	    {
	      	return $this->products->whereHas('categories', function (Builder $query) use($category) {
			    $query->where('name', 'like', '%'.$category.'%');
			});
	    }
	    public function findByStock($category)
	    {
	      	return $this->products->whereHas('stocks', function (Builder $query) use($category) {
			    $query->where('qyt','>=',1);
			});
	    }
	    
	}