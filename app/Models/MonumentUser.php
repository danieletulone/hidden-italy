<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonumentUser extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'monument_id'
    ];

    /**
     * Relationship with monuments table.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function monument()
    {
        return $this->belongsTo('App\Models\Monuments');
    }

    /**
     * Relationship with users table.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
