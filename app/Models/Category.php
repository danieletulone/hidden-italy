<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'description'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'id'
    ];

    public function monuments()
    {
        return $this->hasMany('App\Models\Monument');
    }
}
