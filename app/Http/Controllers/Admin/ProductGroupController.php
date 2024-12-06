<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Group,App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductGroupRequest;

class ProductGroupController extends Controller
{
    protected $groups, $products;
    public function __construct(Group $groups)
    {
        $this->groups = $groups->orderBy('id','desc');
        $this->products = Product::pluck('name','id')->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Group $group)
    {
        return view('admin.products.product-groups',[
            'groups' => $this->groups->paginate(10),
            'group'  => $group,
            'products' => $this->products,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGroupRequest $gRequest)
    {
        $group = new Group;
        $done = $gRequest->AddEditGroupProducts($group);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $product_group)
    {
        return view('admin.products.product-groups',[
            'groups' => $this->groups->paginate(10),
            'group'  => $product_group,
            'products' => $this->products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGroupRequest $gRequest, Group $product_group)
    {
        $done = $gRequest->AddEditGroupProducts($product_group);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_group)
    {
        //
    }
}
