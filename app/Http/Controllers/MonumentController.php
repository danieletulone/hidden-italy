<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\http\Requests\MonumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MonumentController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function __construct()
	{
		// $this->middleware('auth');
	}

	public function index()
	{
		$monuments = Monument::orderBy('id', 'DESC')->get();
		return view('monuments.index')->with('monuments', $monuments);

	}
	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/

	public function create()
	{
		$categories = Category::get()->pluck('description', 'id');
		$users = User::get()->pluck('name', 'id');
		return view('monuments.create')
		->with('users', $users)
		->with('categories', $categories);

	}
	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/

	public function store(MonumentRequest $request)
	{


		$monument = Monument::create([
			'name' => $request->input('name'),
			'description' => $request->input('description'),
			'lat'=> $request->input('lat'),
			'lon'=> $request->input('lon'),
			'user_id' => '1',  // Auth::id()
			'category_id' => $request->input('category_id'),
		]);

		//  $file=$request->file('url');
		//if(!empty($files)){
		//  foreach ($file as $item) {
		Image::create([
			'title' => $request->input('name'),
			'description' => 'Descrizione non disponibile',
			//	'url' =>  $item->store('public/images'),
			'url' =>  $request->file('url')->store('public/images'),
			'monument_id' => $monument->id,
			'user_id' => '1', // Da migliorare
		]);
		//  }
		//};

		return redirect()->action('MonumentController@index');

	}
	/**
	* Display the specified resource.
	*
	* @param  \App\Models\Monument  $modelsMonument
	* @return \Illuminate\Http\Response
	*/

	public function show(Monument $monument)
	{
		// $result = $monument->with('user')->with('images')->first();
		return view('monuments.show')->with('monument', $monument);
	}
	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Models\Monument  $modelsMonument
	* @return \Illuminate\Http\Response
	*/

	public function edit(Monument $monument)
	{
		// $result = $monument->with('user')->with('images')->orderBy('id', 'desc')->first();
		// $users = User::get()->pluck('name', 'id');
		// $images = Image::get()->pluck('title', 'id');
		$categories = Category::get()->pluck('description', 'id');
		return view('monuments.edit')
		->with('categories', $categories)
		->with('monument', $monument);
		// ->with('users', $users)
		// ->with('monument', $result);
		// ->with('images', $images);


	}
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Models\Monument  $modelsMonument
	* @return \Illuminate\Http\Response
	*/

	public function update(MonumentRequest $request, Monument $monument)
	{
		Monument::where('id', $monument->id)->update([
			'name' => $request['name'],
			'description' => $request['description'],
			'lat' => $request['lat'],
			'lon' => $request['lon'],
			'category_id' => $request['category_id'],
			'user_id' => '1',
		]);

		$image_path = $monument->images[0]->url;
		if(Storage::exists($image_path)) {
			Storage::delete($image_path);
		}


		Image::where('monument_id', $monument->id)->update([
			'title' => $request->input('name'),
			'description' => 'Descrizione non disponibile',
			'url' => $request->file('url')->store('public/images'),
			'monument_id' => $monument->id,
			'user_id' => '1', // Da migliorare
		]);

		return redirect()->action('MonumentController@index');

	}
	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Models\Monument  $modelsMonument
	* @return \Illuminate\Http\Response
	*/

	public function destroy(Monument $monument)
	{
		// $result = $monument->with('user')->with('images')->orderBy('id', 'desc')->first();
		foreach ($monument->images as $image) {
			$image_path = $image->url;
			if(Storage::exists($image_path)) {
				Storage::delete($image_path);
			}
		}

		$monument->delete();
		return redirect()->action('MonumentController@index');

	}
}

// $pet_name = $request['name'].".jpg";
// $dom = 'http://localhost:8000';
// $path = $dom.'/storage/'. Storage::putFileAs('product_image', $request->file('product_img')),$pet_name
// CAMBIARE FILESYSTEM DEFAULT IN PUBLIC
