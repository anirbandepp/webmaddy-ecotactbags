<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository,
    App\Product,
    App\Category,
    App\Tag,
    App\TaxSlab,
    \App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productRepository;
    private $categories;
    private $tags;
    public function __construct(ProductRepository $productRepository, Tag $tags)
    {
        $this->productRepository = $productRepository;
        $this->categories = $this->getCategories();
        $this->tags = $tags->pluck('name')->all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();
        if ($request) {
            $products = $this->productRepository->srchProduct($request);
        }
        $products = $products->withCount(['stocks'])->paginate(20);
        return view('admin.products.products', ['products' => $products, 'categories' => $this->categories->pluck('name', 'id')->all(), 'request' => $request])->withInput(request()->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        $taxes = TaxSlab::pluck('name', 'percent_rate')->all();
        $languages = Language::get();
        return view('admin.products.product-add', ['product' => $product, 'tags' => implode(',', $this->tags), 'categories' => $this->categories, 'taxes' => $taxes, 'languages' => $languages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $pRequest)
    {
        $update = 'N';
        // return request('lanCount');
        $product = new Product;
        $done = $pRequest->addEditProduct($product, $update);
        if ($done['type'] == 'success') {
            return redirect()->route('images.create', ['productId' => $product->id])->with('global', $done['msg'])->with('type', $done['type']);
        }
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findById()->find($id);
        $taxes = TaxSlab::pluck('name', 'percent_rate')->all();
        $languages = $product->productDetails()->get();
        return view('admin.products.product-add', ['product' => $product, 'tags' => implode(',', $this->tags), 'categories' => $this->categories, 'taxes' => $taxes, 'languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $pRequest, Product $product)
    {
        $update = 'Y';
        $done = $pRequest->addEditProduct($product, $update);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postBulk(Request $request)
    {
        DB::beginTransaction();
        try {
            if (request('bulk_option') && $request->ids) {
                $arrOption = [
                    'featured' => 1,
                    'active' => 1,
                    'publish_at' => Carbon::now()
                ];
                $fieldName = request('bulk_option');
                $ids = array_map('intval', explode(',', $request->ids));
                foreach ($ids as $id) {
                    $product = $this->productRepository->all()->find($id);
                    $product->update([$fieldName => $arrOption[$fieldName]]);
                }
                DB::commit();
                return redirect()->back()->with('global', 'Updated Successfully')->with('type', 'success');
            } else {
                return redirect()->back()->with('global', 'We didn\'t get any input value')->with('type', 'error');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('global', $e->getMessage())->with('type', 'error');
        }
    }

    public function updateFeaturedProduct(Request $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $this->validate($request, [
                'featured' => 'required|in:0,1'
            ]);
            $product->update(['featured' => request('featured')]);
            DB::commit();
            return response()->json(['type' => ' success', 'featured' => $product->featured]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['type' => ' error', 'msg' => $e->getMessage()]);
            return redirect()->back()->with('global', $e->getMessage())->with('type', 'error');
        }
    }
}
