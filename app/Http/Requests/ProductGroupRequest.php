<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB;
class ProductGroupRequest extends FormRequest
{
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
            'name' => 'unique:groups,name,'.@$this->product_group->id,
        ];
    }
    public function AddEditGroupProducts($group)
    {
        DB::beginTransaction();
        try{
            $group->fill(request()->all());
            $group->save();
            foreach(request('products') as $product)
            {
                $needToCatDlt = [];
                $needToCatAdd = [];
                $alreadyAddedCats = $group->products()->pluck('product_id')->all();
                $needToCatDlt = array_diff( $alreadyAddedCats, request('products') );
                $needToCatAdd = array_diff( request('products') , $alreadyAddedCats );
                $group->products()->attach($needToCatAdd);
                $group->products()->detach($needToCatDlt);
            }
            DB::commit();
            $msg = 'Saved Successfully';
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }catch(Exception $e){
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
}
