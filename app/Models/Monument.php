<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
	protected $fillable = [
		'name', 'description', 'lat', 'lon', 'user_id'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function monumentImages()
	{
		return $this->hasMany('App\Models\MonumentImage');
	}
	public function comments()
	{
		return $this->hasMany('App\Models\Comment');
	}

}
