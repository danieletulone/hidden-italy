<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Monument;
use App\Models\MonumentCategory;
use App\Http\Requests;
use App\http\Requests\MonumentRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController as ApiController;
use App\Http\Resources\Monument as MonumentResource;
use Validator;


class MonumentController extends ApiController
{
    public function index()
		{
			$monuments = Monument::all();
			return $this->SendResponse($monuments, 'List of Monuments');

		}

		public function show($id)
		{
			$monument = Monument::findOrFail($id);
			if (is_null($monument)) {
				return $this->sendError('Monument non found');
			}
			$response = $monument;
			$response->images = $monument->images()->get();
			$response->user = $monument->user()->get();
			$response->category = $monument->category()->get();
			$response->categories = $monument->categories()->get();
			
			return $this->SendResponse($response, 'Specific monument');

		}

		public function store(Request $request)
		{
			$monument = Monument::create([
					'name' => $request->input('name'),
					'description' => $request->input('description'),
					'lat' => $request->input('lat'),
					'lon' => $request->input('lon'),
					'user_id' => '1',  // Auth::id()
					'category_id' => $request->input('main_category_id'),
			]);
			return $this->SendResponse($monument, 'Monument added');

		}

		public function update(Request $request, Monument $monument)
		{
			//
		}

		public function destroy(Monument $monument)
		{
			$monument->delete();
			return $this->sendResponse([], 'Monument deleted'); //nessuna risposta

		}
}
