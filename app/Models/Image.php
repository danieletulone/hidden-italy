<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'title', 'description', 'url', 'monument_id', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function monument()
    {
        return $this->belongsTo('App\Models\Monument');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
