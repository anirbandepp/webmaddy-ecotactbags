<?php

namespace App\Http\Requests;

use App\Size, App\StockHistory;
use DB;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $product;
    public function __construct()
    {
        $this->product = config('app.product');
    }
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
            'price' => 'required|numeric|sometimes',
            'oldPrice' => 'required|numeric|sometimes',
            'pieces' => 'required',
            'weight' => 'required',
            'language_id'   => [
                'required',
                Rule::unique('stocks')
                    ->ignore($this->stock)
                    ->where('product_id', $this->product->id)
                    ->where('pieces', request('pieces'))
                    ->where('size_id', request('size_id'))
            ],
            'size_id'   => [
                'required',
                Rule::unique('stocks')
                    ->ignore($this->stock)
                    ->where('product_id', $this->product->id)
                    ->where('pieces', request('pieces'))
                    ->where('size_id', request('size_id'))
                    ->where('language_id', request('language_id'))
            ]
        ];
    }
    public function addStock($stock)
    {
        DB::beginTransaction();
        try {
            $language = \App\Language::where('id', request('language_id'))->first();
            $stock->size_tag = request('size_tag');
            $stock->hsn = Str::random(30);
            $stock->sku = Str::random(20);
            $stock->regular_price = request('price');
            $stock->max_allowed_qty = request('max_allowed_qty');
            $stock->offer_price = request('price');
            $stock->currency = $language->currency;
            $stock->remaining_qty = 1000000;
            $stock->qty = 1000000;
            $stock->empty_qty = 1000000;
            $stock->size = request('size_id');
            $stock->language_id = $language->id;
            $stock->pieces = request('pieces');
            $stock->weight = request('weight');

            $stock->ship_piece_width = request('ship_piece_width');
            $stock->ship_piece_height = request('ship_piece_height');
            $stock->ship_piece_depth = request('ship_piece_depth');

            $this->product->stocks()->save($stock);
            //$this->stockHistory($stock,'+',request('qty'));
            DB::commit();
            $msg = 'saved successfully';
            $type = 'success';
            return ['msg' => 'Saved Successfully', 'type' => 'success'];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function editStock($stock)
    {
        DB::beginTransaction();
        try {
            $language = \App\Language::where('id', request('language_id'))->first();
            $stock->currency = $language->currency;
            $stock->language_id = $language->id;
            $stock->size = request('size_id');
            $stock->regular_price = request('oldPrice');
            $stock->offer_price = request('oldPrice');
            $stock->pieces = request('pieces');
            $stock->weight = request('weight');
            $stock->max_allowed_qty = request('max_allowed_qty');
            $stock->size_tag = request('size_tag');
            $stock->ship_piece_width = request('ship_piece_width');
            $stock->ship_piece_height = request('ship_piece_height');
            $stock->ship_piece_depth = request('ship_piece_depth');
            $stock->save();
            DB::commit();
            return ['msg' => 'saved successfully', 'type' => 'success'];
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            $type = 'error';
            return ['msg' => $msg, 'type' => $type];
        }
    }
    public function stockHistory($stock, $sign, $qty)
    {
        $stockHistory = new StockHistory;
        $stockHistory->user_id = $stock->user_id;
        $stockHistory->qty = $sign . $qty;
        $stock->StockHistory()->save($stockHistory);
    }
}
