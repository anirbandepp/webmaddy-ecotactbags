<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;

class FrontProductsController extends Controller
{

    private $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    
    public function productsList($slug)
    {
        $category = \App\Category::where('slug',$slug)->first();
        $products = $this->productRepository->all()->whereHas('categories', function (Builder $query) use($slug) {
                $query->where('slug', 'like', '%'.$slug.'%');
            })->with(['productDetails' => function($q)
        {
            $q->where('language_id',config('app.lang')->id);
        }])->orderBy('priority')->get();
        return view('products',['products' => $products,'category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productFullView($category,$slug)
    {
        $backRoute = route('productsList',['slug' => $category]);
        $product = $this->productRepository->all()->where('slug',$slug)->with(['productDetails' => function($q){
            $q->where('language_id',config('app.lang')->id);
        },'stocks'])->first();
        $sizes = $product->stocks()->where('active',1)->get();
        $cart = Session::get('cart');
        $addedQty = 1;
        $alreadyAdded = false;
        if($cart){
            if(isset($cart[$product->stock->sku])){
                $alreadyAdded = true;
                $addedQty = $cart[$product->stock->sku]['qty'];
            }
        }
        return view('product-details',['product' => $product->load(['productImages','stock']), 'addedQty' => $addedQty, 'alreadyAdded' => $alreadyAdded,'sizes' => $sizes,'category' => $category,'backRoute' => $backRoute]);
    }
    
    public function northAmericaFullView($slug)
    {
        $product = $this->productRepository->all()->where('slug',$slug)->with(['productDetails' => function($q){
            $q->where('language_id',config('app.lang')->id);
        },'stocks'])->first();
        $addedQty = 1;
        $alreadyAdded = false;
        Session::put('productId',$product->id);
        return view('north-america',['product' => $product->load(['productImages','stock']), 'addedQty' => $addedQty, 'alreadyAdded' => $alreadyAdded]);
    }
    public function orderNorthNow()
    {
        if(Session::get('productId')){
            $product = $this->productRepository->all()->where('id',Session::get('productId'))->with(['productDetails' => function($q){
                $q->where('language_id',config('app.lang')->id);
            },'stocks' => function($qs){
                $qs->where('language_id',config('app.lang')->id)->first();
            }])->first();
            $qty = request('quantity');
            $totPrice = round($product->stocks[0]['offer_price'] * $qty,2);
            return view('north-america-form',['qty'=> $qty,'totPrice' => $totPrice,'product' => $product->load(['productImages','stock'])]);
        }else{
            return redirect()->route('home');
        }
    }

}
