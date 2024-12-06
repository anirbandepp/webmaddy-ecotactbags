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
        session()->forget('geoloc');
        session()->forget('previp');

        $value = request()->session()->get('lang');
        if (@$value && !is_null($value) && isset($value)) {
            $lanId = $value['id'];
        } else {
            $lanId = config('app.lang')->id;
        }
        $category = \App\Category::where('slug', $slug)->first();
        $products = $this->productRepository->all()->where('featured', '1')->whereHas('categories', function (Builder $query) use ($slug) {
            //$query->where('slug', 'like', '%'.$slug.'%');
            $query->where('slug', $slug);
        })->with(['productDetails' => function ($q)  use ($lanId) {
            $q->where('language_id', $lanId);
        }])->orderBy('priority')->get();
        return view('new_products', ['products' => $products, 'category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productFullView($category, $slug)
    {
        $value = request()->session()->get('lang');
        if (@$value && !is_null($value) && isset($value)) {
            $lanId = $value['id'];
        } else {
            $lanId = config('app.lang')->id;
        }
        $backRoute = route('productsList', ['slug' => $category]);
        $product = $this->productRepository->all()->where('slug', $slug)->with(['productDetails' => function ($q) use ($lanId) {
            $q->where('language_id', $lanId);
        }, 'stocks' => function ($q) {
            $q->where('language_id', config('app.lang')->id);
        }])->first();
        if (!$product) {
            abort(404);
        }
        $stocks = $product->stocks()->where('language_id', config('app.lang')->id)->where('active', 1)->groupBy('size')->pluck('size')->all();
        $ar = [];
        foreach ($stocks as $stk) {
            $arr = [];
            $arr['size'] = $stk;
            $arr['stocks'] = $product->stocks()->where('language_id', config('app.lang')->id)->where('active', 1)->where('size', $stk)->get();
            array_push($ar, $arr);
        }
        $qtys = $product->stocks()->where('active', 1)->groupBy('pieces')->get();
        $cart = Session::get('cart');
        $alreadyAdded = false;
        if ($cart) {
            foreach ($cart as $c) {
                if ($product->id == @$c['product_id']) @$c['product_id'];
                $alreadyAdded = true;
            }
        }
        return view('product-details', ['product' => $product->load(['productImages', 'stock']), 'alreadyAdded' => $alreadyAdded, 'stocks' => $stocks, 'category' => $category, 'backRoute' => $backRoute, 'cart' => $cart, 'qtys' => $qtys, 'ar' => $ar]);
    }

    public function northAmericaFullView($slug)
    {
        $product = $this->productRepository->all()->where('slug', $slug)->with(['productDetails' => function ($q) {
            $q->where('language_id', config('app.lang')->id);
        }, 'stocks'])->first();
        $addedQty = 1;
        $alreadyAdded = false;
        Session::put('productId', $product->id);
        return view('north-america', ['product' => $product->load(['productImages', 'stock']), 'addedQty' => $addedQty, 'alreadyAdded' => $alreadyAdded]);
    }
    public function orderNorthNow()
    {
        if (Session::get('productId')) {
            $product = $this->productRepository->all()->where('id', Session::get('productId'))->with(['productDetails' => function ($q) {
                $q->where('language_id', config('app.lang')->id);
            }, 'stocks' => function ($qs) {
                $qs->where('language_id', config('app.lang')->id)->first();
            }])->first();
            $qty = request('quantity');
            $totPrice = round($product->stocks[0]['offer_price'] * $qty, 2);
            return view('north-america-form', ['qty' => $qty, 'totPrice' => $totPrice, 'product' => $product->load(['productImages', 'stock'])]);
        } else {
            return redirect()->route('home');
        }
    }
}
