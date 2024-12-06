<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = ['id'];

    /* product */
	  public function product()
	  {
	    return $this->belongsTo('App\Product');
	  }
	/* size */
	  public function pSize()
	  {
	    return $this->belongsTo('App\Size','size_id');
	  }
	/* size */
	  public function user()
	  {
	    return $this->belongsTo('App\User');
	  }
	/* Stock History */
	  public function StockHistory()
	  {
	    return $this->hasMany('App\StockHistory');
	  }
	/* size */
	  public function language()
	  {
	    return $this->belongsTo('App\Language');
	  }
    /* Set Size */
		public function setSizeAttribute($id){
	        $size = \App\Size::find($id);
	        $this->attributes['size'] = $size->value;
	        $this->attributes['size_id'] = $size->id;
	    }

}
