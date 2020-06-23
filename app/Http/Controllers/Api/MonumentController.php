<?php

namespace App\Http\Controllers\Api;

use App\Helpers\MonumentHelper;
use App\Http\Requests;
use App\http\Requests\MonumentRequest;
use App\Http\Requests\Monuments\FindNearestRequest;
use App\Models\Monument;
use App\Services\Locator\Locator;

class MonumentController extends ApiController
{

	/**
	 * The relationships for get a full resource response.
	 *
	 * @author Daniele Tulone <danieletulone.work@gmail.com>
	 * 
	 * @var array
	 */
	public array $withs = ['images', 'user', 'category', 'categories'];

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
		$monument = Monument::with($this->withs)->findOrFail($id);


		return response()->json($monument, 200);
	}

	public function store(MonumentRequest $request)
	{
		$monument = Monument::create([
			'name'        => $request->input('name'),
			'description' => $request->input('description'),
			'lat'         => $request->input('lat'),
			'lon' 		  => $request->input('lon'),
			'visible'     => 0,
			'user_id' 	  => 1,
			'category_id' => $request->input('main_category_id'),
		]);

		MonumentHelper::saveAll($request, $monument);
        
		return [
			'success' => true,
			'message' => 'Monument created',
			'data'    => Monument::with($this->withs)->find($monument->id)
		];
	}
}
