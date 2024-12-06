<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockRequest;
use App\Repositories\StockRepository;
use App\Size;
use App\Stock,App\Language;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    private $stockRepository;
    protected $sizes;
    protected $languages;

    public function __construct(StockRepository $stockRepository, Size $sizes, Language $languages)
    {
        $this->stockRepository = $stockRepository;
        $this->sizes = $sizes->pluck('value','id')->all();
        $this->languages = $languages->pluck('slug','id')->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.product-stock',['stocks' => $this->stockRepository->all()->where('product_id',config('app.product')->id)->get(), 'stockCount' => config('app.product')->stocks()->count(), 'sizes' => $this->sizes, 'languages' => $this->languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $sRequest)
    {
        $stock = new Stock;
        $done = $sRequest->addStock($stock);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type'])->withInput(request()->all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockRequest $sRequest, $productSlug, Stock $stock)
    {
        $done = $sRequest->editStock($stock);
        return response()->json(['msg' => $done['msg'], 'type' => $done['type'], 'stock'=> $stock,'language' => $stock->language->slug]);
    }
}
