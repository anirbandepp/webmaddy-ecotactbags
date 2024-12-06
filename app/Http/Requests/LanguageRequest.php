<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Traits\SlugTrait,Str;
use Image;
class LanguageRequest extends FormRequest
{
    use SlugTrait;
    
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
            'name' => 'required'
        ];
    }
    public function addEditLanguage($language)
    {
        $language->fill(request()->all());
        $language->slug = strtoupper(substr(request('name'), 0, 2));
        if(request('image'))
        {
            $uploadFile = request('image');
            $uploadExt = $uploadFile->getClientOriginalExtension();
            $uploadFilename = Str::random(10).'.'.$uploadExt;
            $path = 'languages';
            $thumbLarge = Image::make($uploadFile->getRealPath())->save($path.'/'.$uploadFilename,100);
            $language->image = $uploadFilename;
        }
        $language->save();
        $language->save();
        return ['msg' => 'Saved Successfully', 'type' => 'success'];

    }
}
