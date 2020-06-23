<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Api\ApiController as ApiController;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        if (is_null($category)) {
            return $this->sendError('Monument non found');
        }

        return response()->json($category, 200);
    }
}
