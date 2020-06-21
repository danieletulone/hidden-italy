<?php

namespace App\Helpers;

/**
 * Helper class for table blade component.
 * 
 * @author Daniele Tulone <danieletulone.work@gmail.com>
 */
class TableHelper
{

    /**
     * Get table header from items paginator.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $items
     * @return void
     */
    public static function getHeaders($items)
    {
        return array_keys($items->items()[0]->toArray());
    }

    /**
     * Get data from paginator items.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @return array
     */
    public static function getData($items): array
    {
        return $items->toArray()['data'];
    }
}