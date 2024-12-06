<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class DiscountRequest extends FormRequest
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
            'name' => 'required',
            'value' => 'required', 
            'details' => 'required', 
            'type' => 'required', 
            'active' => 'required', 
            'min_cart_amt' => 'required', 
            'expiry_at' => 'required'
        ];
    }
    public function addEditDiscount($model)
    {
        DB::beginTransaction();
        try{
            $newDiscount = new $model;
            $newDiscount->fill(request()->all());
            $newDiscount->save();
            DB::commit();
            $msg = 'Created successfully';
            $type = 'success';
            return ['msg' => $msg, 'type' => $type];
        }   
        catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }

    }
}
