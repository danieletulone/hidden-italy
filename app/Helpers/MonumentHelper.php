<?php

namespace App\Helpers;

use App\Helpers\AuthHelper;
use App\Models\Image;
use App\Models\MonumentCategory;

class MonumentHelper
{

    /**
     * Save categories, and eventually remove previous, for monument resource.
     * 
     * @param [type] $request
     * @param [type] $monument
     * @param boolean $remove
     * @return void
     */
    public static function saveCategories($request, $monument, $remove = false): void
    {
        if ($remove) {
            $monumentCategories = MonumentCategory::get()->where('monument_id', $monument->id);
            
            foreach ($monumentCategories as $monumentCategory) {
                $monumentCategory->delete();
            }
        }

        if ($request->categories != null && count($request->categories) > 0) {
            foreach ($request->categories as $category) {
                MonumentCategory::create([
                    'monument_id' => $monument->id,
                    'category_id' => $category
                ]);
            }
        }
    }

    /**
     * Save images for new monument.
     *
     * @param [type] $request
     * @param [type] $monument
     * @return void
     */
    public static function saveImages($request, $monument): void
	{
		foreach ($request->file('url') as $image) {
			Image::create([
				'title' => $request->input('name'),
				'description' => 'Descrizione non disponibile',
				'url' =>  $image->store('public/images'),
				'monument_id' => $monument->id,
				'user_id' => AuthHelper::id(),
			]);
        }
    }
    
    /**
     * Save categories and images for given monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $request
     * @param [type] $monument
     * @param boolean $remove
     * @return void
     */
    public static function saveAll($request, $monument, $remove = false): void
    {
        self::saveCategories($request, $monument, $remove);
        self::saveImages($request, $monument);
    }

    public static function deleteImages($monument)
    {
        foreach ($monument->images as $image) {
            $image_path = $image->url;
            
            if (Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
        }
    }
}