<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonumentCategoryInt extends Model
{
	public function image()
	{
			return $this->hasOne('App\Models\Image');
	}
}
