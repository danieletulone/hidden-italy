<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\http\Requests\MonumentRequest;

class MonumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
	    $users = User::get()->pluck('name', 'id');
			//$images = Image::get()->pluck('title', 'id');
			return view('monuments.create')
				->with('users', $users)
				->with('images', $images);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(MonumentRequest $request)
		public function store(MonumentRequest $request)
    {
			Monument::create([
				'name' => $request['name'],
				'description' => $request['description'],
				'lat' => $request['lat'],
				'lon' => $request['lon'],
				'user_id' => $request['user_id'],
				'image_id' => $request['image_id'],
			]);
			Image::create([])
			return redirect()->action('MonumentController@index');

		}
    /**
     * Display the specified resource.
     *
     * @param  \App\ModelsMonument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function show(Monument $monument)
    {
			$user = User::where('id', $monument->user_id)->pluck('name');
			$image = Image::where('id', $monument->image_id)->pluck('url');
			dd($image);
			return view('monuments.show')
			->with('monument', $monument)
			->with('user', $user);

		}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelsMonument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function edit(Monument $monument)
    {
			$users = User::get()->pluck('name', 'id');
			$images = Image::get()->pluck('title', 'id');
			return view('monuments.edit')
				->with('users', $users)
				->with('monument', $monument)
				->with('images', $images);

		}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelsMonument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function update(MonumentRequest $request, Monument $monument)
    {
			Monument::where('id', $monument->id)->update([
				'name' => $request['name'],
				'description' => $request['description'],
				'lat' => $request['lat'],
				'lon' => $request['lon'],
				'user_id' => $request['user_id'],
				'image_id' => $request['image_id'],
			]);
			return redirect()->action('MonumentController@index');

		}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelsMonument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monument $monument)
    {
			$monument->delete();
			return redirect()->action('MonumentController@index');

		}
}
