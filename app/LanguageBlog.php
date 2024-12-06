<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageBlog extends Model
{
    protected $table = 'language__blogs';
    protected $guarded = ['id'];
    protected $appends = ['short_desc','custom_date','full_desc','blog_title'];

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function getShortDescAttribute(){
        
        $string = strip_tags($this->desc);
        if(@config('app.lang') && config('app.lang')->slug == 'sp'){
            $string = strip_tags(__('blog.'.$this->id));
            if($string === 'blog.'.$this->id){
                $string = strip_tags($this->desc);
            }
        }
        if (strlen($string) > 100) {
        
            $stringCut = substr($string, 0, 100);
            $endPoint = strrpos($stringCut, ' ');

            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
    
    public function getFullDescAttribute(){
        
        $string =$this->desc;
        if(@config('app.lang') && config('app.lang')->slug == 'sp'){
            $string = __('blog.'.$this->id);
            if($string === 'blog.'.$this->id){
                $string = $this->desc;
            }
        }
        return $string;
    }
    
     public function getBlogTitleAttribute(){
        
        $string =$this->title;
        if(@config('app.lang') && config('app.lang')->slug == 'sp'){
            $string = __('blog.'.$this->id.'t');
            if($string === 'blog.'.$this->id.'t'){
                $string = $this->title;
            }
        }
        return $string;
    }
    
    public function getCustomDateAttribute(){
        return $date = \Carbon\Carbon::parse($this->date)->format('l F d, Y');
    }
}
