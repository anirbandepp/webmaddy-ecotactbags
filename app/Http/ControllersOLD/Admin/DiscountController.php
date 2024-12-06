<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Repositories\DiscountRepository;
use Illuminate\Http\Request;
use \App\Http\Traits\SlugTrait;

class DiscountController extends Controller
{
    use SlugTrait;
    private $discountRepository;
    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $discounts = $this->discountRepository->allDiscounts($request)->paginate(20);
        return view('admin.discounts.discounts',compact('discounts','request'))->withInput(request()->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $drequest,$discountType)
    {
        $model = $this->discountRepository->getModel();
        $done = $drequest->addEditDiscount($model);
        return redirect()->back()->with('global',$done['msg'])->with('type',$done['type']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$discountType, $id)
    {
        $discount = $this->discountRepository->findbyId($id)->first();
        if($discount->active){
            $discount->active = 0;
        }else{
            $discount->active = 1;
        }
        $discount->save();
        return redirect()->back()->with('global','Status Changed')->with('type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($discountType,$id)
    {
        $discount = $this->discountRepository->findbyId($id)->first();
        $discount->delete();
        return redirect()->back()->with('global','Deleted Successfully')->with('type','success');
    }
}
