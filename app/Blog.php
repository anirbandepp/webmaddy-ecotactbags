<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    // protected $appends = ['img_url','fullview_img_url','short_desc','custom_date','full_desc','blog_title'];
    protected $appends = ['img_url', 'fullview_img_url'];

    public function getImgUrlAttribute()
    {
        return $this->image ? \URL::to('/') . '/blogs/' . $this->image : null;
    }
    public function getFullviewImgUrlAttribute()
    {
        return $this->fullview_image ? \URL::to('/') . '/blogs/fullview/' . $this->fullview_image : null;
    }

    // public function getShortDescAttribute(){

    //     $string = strip_tags($this->desc);
    //     if(@config('app.lang') && config('app.lang')->slug == 'sp'){
    //         $string = strip_tags(__('blog.'.$this->id));
    //         if($string === 'blog.'.$this->id){
    //             $string = strip_tags($this->desc);
    //         }
    //     }
    //     if (strlen($string) > 100) {

    //         $stringCut = substr($string, 0, 100);
    //         $endPoint = strrpos($stringCut, ' ');

    //         $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    //         $string .= '...';
    //     }
    //     return $string;
    // }

    // public function getFullDescAttribute(){

    //     $string =$this->desc;
    //     if(@config('app.lang') && config('app.lang')->slug == 'sp'){
    //         $string = __('blog.'.$this->id);
    //         if($string === 'blog.'.$this->id){
    //             $string = $this->desc;
    //         }
    //     }
    //     return $string;
    // }

    //  public function getBlogTitleAttribute(){

    //     $string =$this->title;
    //     if(@config('app.lang') && config('app.lang')->slug == 'sp'){
    //         $string = __('blog.'.$this->id.'t');
    //         if($string === 'blog.'.$this->id.'t'){
    //             $string = $this->title;
    //         }
    //     }
    //     return $string;
    // }

    // public function getCustomDateAttribute(){
    //     return $date = \Carbon\Carbon::parse($this->date)->format('l F d, Y');
    // }
    /* Category */
    public function categories()
    {
        return $this->belongsToMany('App\BlogCategory', 'blog_category_blogs', 'blog_id', 'blog_category_id');
    }

    /* blog Language Datas */
    public function blogDetails()
    {
        return $this->hasMany('App\LanguageBlog');
    }
}
