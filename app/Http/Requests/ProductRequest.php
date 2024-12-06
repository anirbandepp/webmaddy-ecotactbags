<?php

namespace App\Http\Requests;
use App\Http\Controllers\Controller;
use DB,Str,Storage;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\SlugTrait;
use \App\Language , \App\ProductDetail;

class ProductRequest extends FormRequest
{
    use SlugTrait;
    
    protected $id;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'slug' => 'sometimes|unique:products,slug,'.@$this->product->id,
            'active' => 'required',
            'featured' => 'required',
            'publish_at' => 'required',
            'product_category' => 'exists:categories,id',
            'product_tags' => 'exists:tags,id'
        ];
    }
    public function addEditProduct($product,$update)
    {
        DB::beginTransaction();
        try
        {
            $request = request()->all();
            if($update == 'N'){
            $product->slug = '';
            }
            $product->type = 'simple';           
            $product->active = (int) $request['active'];
            $product->featured = (int) $request['featured'];
            $product->orderable = (int) $request['orderable'];
            $product->publish_at = $request['publish_at'];
            $product->save();

            for ($i=1; $i <= request('lanCount'); $i++) { 
                $language = Language::find(request('language_id'.$i));
                if($language->is_default == 'Y'){
                    if($update == 'N'){
                        $slug = $this->generateArticleslug(request('name'.$i),$product->id,'\App\Product');
                        $product->update(['slug' => $slug]);
                    }
                }
                $detail = ProductDetail::updateOrCreate(['product_id' => $product->id, 'language_id' => $language->id],[
                    'language_name' => $language->name,
                    'product_name' => request('name'.$i),
                    'short_desc' => request('short_desc'.$i),
                    'full_desc' => request('full_desc'.$i),
                    'meta_title' => request('meta_title'.$i),
                    'meta_desc' => request('meta_desc'.$i),
                    'meta_keys' => request('meta_keys'.$i),
                    'banner_text' => request('banner_text'.$i)
                ]);
            }
            if(request('product_category'))
            {
                $needToCatDlt = [];
                $needToCatAdd = [];
                if(request()->has('product_category'))
                {
                    $alreadyAddedCats = $product->categories()->pluck('category_id')->all();
                    $needToCatDlt = array_diff( $alreadyAddedCats, request('product_category') );
                    $needToCatAdd = array_diff( request('product_category') , $alreadyAddedCats );
                }
                $product->categories()->attach($needToCatAdd);
                $product->categories()->detach($needToCatDlt);
            }
            if(request('tags'))
            {
                $tagsArray = [];
                $tagsArr = explode(',', request('tags'));
                foreach($tagsArr as $tag){
                    $tagSlug = $this->generateArticleslug($tag,0,'\App\Tag');
                    $tagExist = \App\Tag::where('name', $tag)->first();
                    if($tagExist){

                    }else{
                        $tagExist = \App\Tag::create(['name' => $tag,'slug' => $tagSlug]);
                    }
                    array_push($tagsArray,$tagExist->id);
                }
                $needToDlt = [];
                $needToAdd = [];
                if(request()->has('tags'))
                {
                    $alreadyAddedTags = $product->tags()->pluck('tag_id')->all();
                    $needToDlt = array_diff($alreadyAddedTags, $tagsArray);
                    $needToAdd = array_diff($tagsArray , $alreadyAddedTags );
                }
                $product->tags()->attach($needToAdd);
                $product->tags()->detach($needToDlt);
            }
            if(request()->file('manual'))
            {
                $uploadFile = request()->file('manual');
                $uploadExt = $uploadFile->getClientOriginalExtension();
                $uploadFilename = Str::random(10).'.'.$uploadExt;
                $uploadFile->move(public_path('manual'), $uploadFilename);
                $product->update(['manual' => $uploadFilename]);
            }
            DB::commit();
            return ['msg' => 'Saved Successfully', 'type' => 'success'];
        }
        catch(\Exception $e)
        {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
}
