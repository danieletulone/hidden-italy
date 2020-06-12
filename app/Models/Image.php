<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $fillable = [
			'title', 'description', 'url',
	];
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
}
