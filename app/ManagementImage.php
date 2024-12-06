<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagementImage extends Model
{
    protected $guarded = ['id'];
    //protected $table = ('managements');
    protected $table = 'management_images';
    protected $appends = ['alt'];
    
        public function getAltAttribute() 
        {
            return $this->managementImages()->where('url',$this->url)->first()->alt;
        }

    
	/* Management images */
	  	public function management()
	  	{
	    	return $this->belongsTo('App\Management');
	  	}
     
}
