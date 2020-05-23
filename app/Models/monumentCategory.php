<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonumentCategory extends Model
{
    protected $fillable = [
        'monument_id',
        'category_id'
    ];

    public $timestamps = false;
}
