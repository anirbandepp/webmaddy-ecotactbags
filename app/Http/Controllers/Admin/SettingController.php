<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShippingCharge, App\Attribute, DB, App\AttributeSet, \App\TaxSlab, \App\DeliveryService, \App\Size, App\Category, Str;
use \App\Http\Traits\SlugTrait;

class SettingController extends Controller
{
    use SlugTrait;
    /* Attributes */
    public function allAttribute(Request $request, Attribute $attribute)
    {
        $attributes = Attribute::orderBy('id', 'desc')->with('sets')->paginate(10);
        return view('admin.settings.attributes', compact('attributes', 'attribute'));
    }
    public function postAttribute(Request $request, Attribute $attribute)
    {
        $this->validate($request, [
            'name' => 'required|unique:attributes,name,' . $attribute->id,
            'slug' => 'required|sometimes|unique:attributes,slug,' . $attribute->id,
            'type' => 'required'
        ]);
        $done = $this->saveSettingData('\App\Attribute', $attribute, 1);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
    /* Attributes Values Set */
    public function attributeValues(Request $request, $attributeId, AttributeSet $attributeValue)
    {
        // return $attributeValue;
        $attributeValues = AttributeSet::where('attribute_id', $attributeId)->orderBy('id', 'desc')->paginate(10);
        return view('admin.settings.attribute-set', compact('attributeValues', 'attributeValue'));
    }
    public function postAttributeValue(Request $request, $attributeId, AttributeSet $attributeValue)
    {
        if (!$attributeValue->id) {
            $request->merge([
                'slug' => $this->generateArticleslug(request('name'), $attributeValue->id, '\App\AttributeSet'),
            ]);
        }
        $this->validate($request, [
            'slug' => 'required|unique:attribute_sets,slug,' . $attributeValue->id,
            'name' => 'required',
            'fileToUpload' => 'required|sometimes|mimes:jpeg,jpg,png,gif'
        ]);
        if (config('app.attribute')->type == 'color') {
            $this->validate($request, [
                'colorPicker' => 'required'
            ]);
        }
        DB::beginTransaction();
        try {
            $value = null;
            $attribute = config('app.attribute');
            if ($attributeValue) {
            } else {
                $attributeValue = new AttributeSet;
            }
            $attributeValue->fill(request()->all());
            $attributeValue->attribute_id = $attribute->id;
            $attributeValue->slug = Str::slug(request('slug'), '-');
            $attributeValue->save();
            if ($attribute->type == 'img') {
                if (request('fileToUpload')) {
                    $file = request('fileToUpload');
                    $uploadExt = $file->getClientOriginalExtension();
                    $uploadFilename = $attributeValue->id . '.' . $uploadExt;
                    $destinationPath = 'attributes';
                    $file->move($destinationPath, $uploadFilename);
                    $value = 'attributes/' . $uploadFilename;
                }
            } elseif ($attribute->type == 'color') {
                $value = request('colorPicker');
            }
            $attributeValue->update(['value' => $value]);
            DB::commit();
            return redirect()->back()->with('global', 'updated successfully')->with('type', 'success');
        } catch (\Exception $e) {
            DB::rollback();
            $msg = $e->getMessage();
            return redirect()->back()->with('global', $msg)->with('type', 'danger')->withInput(request()->all());
        }
    }
    /* Tax Slabe */
    public function getTaxSlabs(Request $request, TaxSlab $taxSlab)
    {
        $taxes = TaxSlab::orderBy('id', 'desc')->paginate(10);
        return view('admin.settings.taxes', compact('taxes', 'taxSlab'));
    }
    public function postTaxSlabs(Request $request, TaxSlab $taxSlab)
    {
        $this->validate(request(), [
            'name' => 'required',
            'percent_rate' => 'required|numeric',
            'active' => 'required',
        ]);
        $done = $this->saveSettingData('\App\TaxSlab', $taxSlab, 0);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
    /* Delivary Services */
    public function getDelivaryService(Request $request, DeliveryService $deliveryService)
    {
        $deliveryServices = DeliveryService::orderBy('id', 'desc')->paginate(10);
        return view('admin.settings.delivery-services', compact('deliveryServices', 'deliveryService'));
    }
    public function postDelivaryService(Request $request, DeliveryService $deliveryService)
    {
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required|sometimes|unique:delivery_services,slug,' . $deliveryService->id,
            'details' => 'required',
            'tracking_url' => 'required',
            'active' => 'required',
        ]);
        $done = $this->saveSettingData('\App\DeliveryService', $deliveryService, 1);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
    /* Manage Sizes */
    public function getSizes(Request $request, Size $size)
    {
        $sizes = Size::orderBy('id', 'desc')->paginate(10);
        return view('admin.settings.manage_sizes', compact('sizes', 'size'));
    }
    public function postSizes(Request $request, Size $size)
    {
        $this->validate(request(), [
            'value' => 'required',
            'slug' => 'required|sometimes|unique:sizes,slug,' . $size->id,
        ]);
        $done = $this->saveSettingData('\App\Size', $size, 1);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
    /* Manage Categories */
    public function getCategory(Request $request, Category $category)
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        $parentCats = Category::where('active', 1)->pluck('name', 'id')->all();
        return view('admin.settings.categories', compact('categories', 'category', 'parentCats'));
    }
    public function postCategory(Request $request, Category $category)
    {
        $this->validate(request(), [
            'name' => 'required',
            'details' => 'required',
            'active' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keys'  => 'required',
        ]);
        DB::beginTransaction();
        try {
            if ($category) {
            } else {
                $category = new Category;
            }
            $category->fill(request()->all());
            $category->slug = Str::slug(request('name'), '-');
            $category->save();
            if (request('img')) {
                $file = request('img');
                $uploadExt = $file->getClientOriginalExtension();
                $uploadFilename = $category->id . '.' . $uploadExt;
                $destinationPath = 'categoryImages';
                $file->move($destinationPath, $uploadFilename);
                $value = 'categoryImages/' . $uploadFilename;
                $category->update(['img' => $value]);
            }
            DB::commit();
            return redirect()->back()->with('global', 'updated successfully')->with('type', 'success');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('global', $e->getMsg())->with('type', 'danger')->withInput(request()->all());
        }
    }
    /* Shipping Charges */
    public function getShippingCharges(Request $request, ShippingCharge $ShippingCharge)
    {
        $ShippingCharges = ShippingCharge::orderBy('id', 'desc')->paginate(10);
        return view('admin.settings.shipping-charges', compact('ShippingCharges', 'ShippingCharge'));
    }
    public function postShippingCharge(Request $request, ShippingCharge $ShippingCharge)
    {
        $this->validate(request(), [
            'amt' => 'required',
            'tax_inclusive_rate' => 'required',
            'active' => 'required',
        ]);
        $done = $this->saveSettingData('\App\ShippingCharge', $ShippingCharge, 0);
        return redirect()->back()->with('global', $done['msg'])->with('type', $done['type']);
    }
}
