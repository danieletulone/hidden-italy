<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'lat', 'lon', 'user_id', 'category_id', 'visible',
    ];

    protected $casts = [
        'lat' => 'double',
        'lon' => 'double',
        'visible' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * The categories through pivot table.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\MonumentCategory',
            'monument_id',
            'id',
            'id',
            'category_id'
        );
    }
}
