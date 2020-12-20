<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = "cms";
	protected $fillable = ['cms_type', 'content'];

}
