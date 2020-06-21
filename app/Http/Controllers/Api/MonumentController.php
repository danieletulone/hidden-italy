<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Api\ApiController as ApiController;
use App\Http\Requests;
use App\http\Requests\MonumentRequest;
use App\Http\Requests\Monuments\FindNearestRequest;
use App\Models\Image;
use App\Models\Monument;
use App\Models\MonumentCategory;
use App\Services\Locator\Locator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonumentController extends ApiController
{
	public function saveCategories($request, $monument)
	{
		if ($request->categories != null && count($request->categories) > 0) {
			foreach ($request->categories as $category) {
				MonumentCategory::create([
					'monument_id' => $monument->id,
					'category_id' => $category
				]);
			}
		}
	}

	public function createResponse($monument)
	{
		$response = $monument;
		$response->images = $monument->images()->get();
		$response->user = $monument->user()->get();
		$response->category = $monument->category()->get();
		$response->categories = $monument->categories()->get();

		return $response;
	}

	public function saveImages($request, $monument)
	{
		foreach ($request->file('url') as $image) {
			Image::create([
				'title' => $request->input('name'),
				'description' => 'Descrizione non disponibile',
				'url' =>  $image->store('public/images'),
				'monument_id' => $monument->id,
				'user_id' => '1', // Auth::id()
			]);
		}
	}

	public function index()
	{
		$monuments = Monument::orderBy('id', 'DESC')
		->where('visible', true)
		->with('categories')
		->with('images')
		->get();

		return response()->json($monuments, 200);
	}

	/**
	* Seach in the DB the n* nearest monuments to the current Locator
	* where n* is how many monuments u want to return
	*
	* NOTE: Paginate give conflict so we perform a manual pagination using take and skip methods.
	*
	* @author Daniele Tulone <danieletulone.work@gmail.com>
	*/
	public function findNearest(FindNearestRequest $request)
	{
		return app()->make(Locator::class)->find(Monument::class);
	}

	public function show($id)
	{
		$monument = Monument::findOrFail($id);

		if (is_null($monument)) {
			return $this->sendError('Monument non found');
		}

		$response = $this->createResponse($monument);

		return response()->json($monument, 200);
	}

	public function store(MonumentRequest $request)
	{
		$monument = Monument::create([
			'name' => $request->input('name'),
			'description' => $request->input('description'),
			'lat' => $request->input('lat'),
			'lon' => $request->input('lon'),
			'visible' => 0,
			'user_id' => '1',  // Auth::id()
			'category_id' => $request->input('main_category_id'),
		]);

		$this->saveImages($request, $monument);
		$this->saveCategories($request, $monument);
        
		$response = $this->createResponse($monument);

		return $this->SendResponse($response, 'Monument added');
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
