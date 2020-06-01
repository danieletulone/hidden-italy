<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monument extends Model
{
    protected $fillable = [
        'name', 'description', 'lat', 'lon', 'user_id', 'category_id', 'visible',
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
