<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonumentImage extends Model
{
	protected $fillable = [
			'monument_id', 'image_id'
	];
	public function monument()
	{
		return $this->belongsTo('App\Models\Monument');
	}
	public function image()
	{
		return $this->belongsTo('App\Models\Image');
	}
}
