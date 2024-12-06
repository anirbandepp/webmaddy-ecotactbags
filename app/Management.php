<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $guarded = ['id'];
    //protected $table = ('managements');
    protected $table = 'managements';
    protected $appends = ['alt'];
    
        public function getAltAttribute() 
        {
            return $this->managementImages()->where('url',$this->base_img)->first()->alt;
        }

    
	/* Management images */
	  	public function managementImages()
	  	{
	    	return $this->hasMany('App\ManagementImage');
	  	}
     
}
