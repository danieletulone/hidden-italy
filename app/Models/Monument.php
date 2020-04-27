<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
	protected $fillable = [
			'name', 'description', 'lat', 'lon', 'user_id', 'image_id'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function image()
	{
		return $this->belongsTo('App\Models\Image');
	}

	public function comments()
	{
	return $this->hasMany('App\Models\Comment');
	}
	
}
