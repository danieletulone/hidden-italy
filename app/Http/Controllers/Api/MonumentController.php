<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Monument;
use App\Models\MonumentCategory;
use App\Http\Requests;
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
			$monument = Monument::find($id);
			$monumentCategories = MonumentCategories::where('monument_id', $monument->id);
			if (is_null($monumentCategories)) {
				return $this->sendError('Monument non found');
			}
			return $this->SendResponse($monument, 'Specific monument');

		}

		public function store(Request $request)
		{
			//
		}

		public function update(Request $request, Monument $monument)
		{
			//
		}

		public function destroy(Monument $monument)
		{
			$monument->delete();
			return $this->sendResponse([], 'Task deleted'); //nessuna risposta

		}
}
