<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;

class MonumentController extends Controller
{
		// public function __construct()
		// {
		// 	$this->middleware('auth');
		// }

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
				$images = Image::get()->pluck('title', 'id');
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
    public function store(Request $request)
    {
			Monument::create([
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
     * Display the specified resource.
     *
     * @param  \App\ModelsMonument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function show(Monument $monument)
    {
			return view('monuments.show', ['monument' => $monument]);

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
    public function update(Request $request, Monument $monument)
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
