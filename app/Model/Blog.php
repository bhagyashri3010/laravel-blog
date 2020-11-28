<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = "blogs";
	protected $fillable = ['title', 'description', 'category_id', 'image', 'created_on', 'created_by', 'is_published', 'updated_on', 'updated_by'];

	public function category(){
		return $this->belongsTo('App\Model\Category','category_id','id');
	}

}
