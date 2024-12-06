<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductImage;
use Illuminate\Http\Request;
use Str,Image,Storage,DB;

class ProductImageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.product-images',['images' => config('app.product')->productImages()->paginate(20),'base_img' => config('app.product')->base_img])->withInput(request()->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.product-image-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,gif',
        ]);
        DB::beginTransaction();
        try
        {
            $product = config('app.product');
            foreach(request('image') as $image)
            {
                $newImage = new ProductImage;
                $uploadFile = $image;
                $uploadExt = $uploadFile->getClientOriginalExtension();
                $uploadFilename = Str::random(10).'.'.$uploadExt;
                $destinationPathExtraLarge = 'product_images/extra-large/';
                $destinationPathLarge = 'product_images/large/';
                $destinationPathMedium = 'product_images/medium/';
                $destinationPathSmall = 'product_images/small/';
                $thumbLarge = Image::make($uploadFile->getRealPath())->resize(800,800, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
                $thumbLarge = Image::make($uploadFile->getRealPath())->resize(500,500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($destinationPathLarge.'/'.$uploadFilename,100);

                $thumbMedium = Image::make($uploadFile->getRealPath())->resize(400,400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($destinationPathMedium.'/'.$uploadFilename,100);
                $thumbSmall = Image::make($uploadFile->getRealPath())->resize(80,80, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($destinationPathSmall.'/'.$uploadFilename,100);
                $newImage->fill(['alt' => $product->name,'url' => $uploadFilename]);
                $product->productImages()->save($newImage);

            }
            DB::commit();
            return redirect()->route('images.index',['productId' => config('app.product')->id])->with('global','Image Uploaded Successfully')->with('type','success');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
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
    public function update(Request $request, $productSlug, ProductImage $image)
    {
        $this->validate(request(),[
            'alt'           => 'required',      
            'active'       => 'required|in:0,1',    
            'publish_at' => 'required|date'
        ]);
        DB::beginTransaction();
        try{
            $image->fill(request()->all());
            $image->save();
            DB::commit();
            $msg = '';
            $type = '';
            return response()->json(['msg' => 'saved successfully', 'type' => 'success', 'image'=> $image]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['msg' => $e->getMessage(), 'type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productSlug, ProductImage $image)
    {
        DB::beginTransaction();
        try{
            $image->delete();
            Storage::disk('uploads')->delete('large/'.$image->url);
            Storage::disk('uploads')->delete('small/'.$image->url);
            Storage::disk('uploads')->delete('medium/'.$image->url);
            DB::commit();
            return redirect()->back()->with('global','Image Deleted Successfully')->with('type','success');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('global',$e->getMessage())->with('type','error');
        }
    }

    /* Make Base Image */
        public function makeBaseImage($productSlug, ProductImage $image)
        {
            DB::beginTransaction();
            try{
                config('app.product')->update(['base_img' => $image->url]);
                DB::commit();
                return redirect()->back()->with('global','Base Image Saved Successfully')->with('type','success');
            }catch(\Exception $e){
                DB::rollback();
                return redirect()->back()->with('global',$e->getMessage())->with('type','error');
            }
        }
}
