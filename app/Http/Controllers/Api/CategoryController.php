<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MonumentCategory;
use App\Http\Requests;
use App\http\Requests\MonumentRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController as ApiController;
use App\Http\Resources\Monument as MonumentResource;
use Validator;


class CategoryController extends ApiController
{
    public function index()
		{
			$categories = Category::all();
			//return $this->SendResponse($categories, 'List of Category');
			return response()->json($categories, 200);

		}

		public function show($id)
		{
			$category = Category::find($id);
			if (is_null($category)) {
				return $this->sendError('Monument non found');
			}
			//return $this->SendResponse($category, 'Specific category');
			return response()->json($category, 200);


		}
}
