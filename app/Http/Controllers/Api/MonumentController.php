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
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class MonumentController extends ApiController
{
	public function createResponse($monument)
	{
		$response = $monument;
		$response->images = $monument->images()->get();
		$response->user = $monument->user()->get();
		$response->category = $monument->category()->get();
		$response->categories = $monument->categories()->get();
		return $response;

	}

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
		$monuments = Monument::orderBy('id', 'DESC')->where('visible', true)
				->with('categories')
				->with('images')
				->get();
		//$response = $this->createResponse($monuments);
		//return $this->SendResponse($monuments, 'List of Monuments');

		return response()->json($monuments, 200);
	}

	/**
	 *
	 * Seach in the DB the n* nearest monuments to the current location
	 * where n* is how many monuments u want to return
	 *
     * @author Andrea, Alberto
     *
     */

	public function findNearest(Request $request)
    {
		$lat = $request->lat;
		$lon = $request->lon;
		$distance = 3;
		$limit = 20;
		$query= DB::select('SELECT id, (
				6371 * acos (cos ( radians('.$lat.') )
				* cos( radians( lat ) )
				* cos( radians( lon ) - radians('.$lon.') )
				+ sin ( radians('.$lat.') )
				* sin( radians( lat ) )
				) )
				AS distance
				FROM monuments  WHERE visible = 1
				HAVING distance < '.$distance.'
				ORDER BY distance
				LIMIT 0 , '.$limit.';');
		$response = [];
		foreach($query as $q){
				$res = Monument::find($q->id)->with('categories')->with('category')->with('images')->first();
				$res->distance = $q->distance;
				array_push($response, $res);
		}

		return response()->json($response, 200);
	}

	public function show($id)
	{
		$monument = Monument::findOrFail($id);
		if (is_null($monument)) {
			return $this->sendError('Monument non found');
		}
		$response = $this->createResponse($monument);
		//return $this->SendResponse($response, 'Specific monument');

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
