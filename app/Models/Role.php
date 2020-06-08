<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	/**
	 * Tha attributes that are mass assignable.
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com>
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'scope'
	];

	/**
	 * List of roles defined.
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com>
	 *
	 * @var array
	 */
	protected $scopes = [
		'admin',
		'monument-manager',
		'superadmin',
		'user',
	];
	
	/**
	 * Relationship with User model
	 * 
	 * @author Daniele Tulone <danieletulone.work@gmail.com> 
	 *
	 * @return void
	 */
	public function users()
	{
		return $this->belongsTo('App\User');
	}
}
