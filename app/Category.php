<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'details', 'parent_id', 'active', 'img', 'meta_title', 'meta_desc' ,'meta_keys'];

	/* All categories */
		public function parent() 
		{
		    return $this->belongsTo(self::class,'parent_id','id');
		}

		public function childs() {
		    return $this->hasMany(self::class,'parent_id','id');
		}
}
