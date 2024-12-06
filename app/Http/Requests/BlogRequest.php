<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Image,Str;
use \App\Language, \App\LanguageBlog;

class BlogRequest extends FormRequest
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
        $languages = \App\Language::where('is_visible',1)->get();
        $route = \Route::currentRouteName();
        if($route == 'blogs.store')
        {
            foreach($languages as $key => $value)
            {
                $rules['title'.$value->id] = 'required';
                break;
            }
            $rules['image'] = 'required';
            $rules['fullview_image'] = 'required';
        }
        if($route == 'blogs.update')
        {
            foreach($languages as $key => $value)
            {
                $rules['title'.$value->id] = 'required';
                break;
            }
        }
        return $rules;
        // return [
            // 'title1' => 'required',
            // 'desc' => 'required'
            //'image' => 'required_without:blog',
            //'fullview_image' => 'required_without:blog'
        // ];
    }
    
    public function messages()
    {
        $languages = \App\Language::where('is_visible',1)->get();
        
        //dd($languages);
        $route = \Route::currentRouteName();
        if($route == 'blogs.store')
        {
            foreach($languages as $key => $value)
            {
                //dd($key);
                $message['title'.$value->id.'.required'] = $value->name." Blog title can't fill blank";
            }
            $message['image.required'] = 'Image is required';
            $message['fullview_image.required'] = 'Full view image is required';
        }
        if($route == 'blogs.update')
        {
            foreach($languages as $key => $value)
            {
                //dd(request()->all());
                $message['title'.$value->id.'.required'] = $value->name." Blog title can't fill blank";
            }
        }
        return $message;
    }

    public function addEditBlog($blog)
    {
        $firstLan = Language::first();
        $blog->slug = Str::slug(request('title'.$firstLan->id));
        $blog->fill(request()->all());
        if(request()->hasFile('image')){

            $uploadFile = request('image');
            $uploadExt = $uploadFile->getClientOriginalExtension();
            $uploadFilename = Str::random(10).'.'.$uploadExt;
            $destinationPathExtraLarge = 'blogs/';
            $thumbLarge = Image::make($uploadFile->getRealPath())->resize(500,312)->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
            // $thumbLarge = Image::make($uploadFile->getRealPath())->resize(550,320, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // })->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
            $blog->image = $uploadFilename;
        }
        if(request()->hasFile('fullview_image')){

            $uploadFile = request('fullview_image');
            $uploadExt = $uploadFile->getClientOriginalExtension();
            $uploadFilename = Str::random(10).'.'.$uploadExt;
            $destinationPathExtraLarge = 'blogs/fullview';
            $thumbLarge = Image::make($uploadFile->getRealPath())->resize(function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($destinationPathExtraLarge.'/'.$uploadFilename,100);
            $blog->fullview_image = $uploadFilename;
        }
        $blog->save();
        if(request('blog_category'))
        {
            $needToCatDlt = [];
            $needToCatAdd = [];
            if(request()->has('blog_category'))
            {
                $alreadyAddedCats = $blog->categories()->pluck('blog_category_id')->all();
                $needToCatDlt = array_diff( $alreadyAddedCats, request('blog_category') );
                $needToCatAdd = array_diff( request('blog_category') , $alreadyAddedCats );
            }
            $blog->categories()->attach($needToCatAdd);
            $blog->categories()->detach($needToCatDlt);
        }
        for($i=1; $i<=request('lanCount'); $i++)
        {
            $lanId = Language::find(request('language_id'.$i));
            LanguageBlog::updateOrCreate(['blog_id'=>$blog->id, 'language_id'=>$lanId->id],[
                'title'=>request('title'.$lanId->id),
                'desc'=>request('blog_desc'.$lanId->id),
                'date'=>request('blog_date'.$lanId->id)
            ]);
        }
        return ['msg' => 'Updated Successfully', 'type' => 'success'];
    }
}
