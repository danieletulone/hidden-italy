<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'monument_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function monument()
    {
        return $this->belongsTo('App\Models\Monument');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }
}
