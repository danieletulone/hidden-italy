<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Monument;
use App\Models\User;

class ResourceCounter
{
    /**
     * Count resources in database.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return int
     */
    private static function count($resource)
    {
        return $resource::count();
    }

    /**
     * Count monuments in database.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return int
     */
    public static function monuments()
    {
        return self::count(Monument::class);
    }

    /**
     * Count users in database.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return int
     */
    public static function users()
    {
        return self::count(User::class);
    }

    /**
     * Count categories in database.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return int
     */
    public static function categories()
    {
        return self::count(Category::class);
    }
}