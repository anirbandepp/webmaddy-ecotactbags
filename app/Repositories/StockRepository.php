<?php
	namespace App\Repositories;
	use App\Stock;
	class StockRepository
	{
		protected $stocks;
		public function __construct(Stock $stocks)
		{
			$this->stocks = $stocks;
		}
		public function all()
	    {
	      	// return $this->stocks->with(['product','pSize'])->orderBy('id','desc');
	      	return $this->stocks->orderBy('id','desc');
	    }
	}