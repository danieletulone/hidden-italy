<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			//dd();
			$images = Image::orderBy('created_at', 'DESC')->get();
			return view('images.index')
				->with('images', $images);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				$image = new Image();

				$image->title = $request->input('title');
				$image->description = $request->input('description');
				$image->url = $request->file('url')->store('public/images');
				$image->save();

				return redirect()->action('ImageController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
			//dd($image);
		//	return view('monuments.show', ['monument' => $monument]);
			return view('images.show')->with('image', $image);
			//return view('images.show', ['image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
			return view('images.edit')->with('image', $image);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
			$image->title = $request->input('title');
			$image->description = $request->input('description');
			if($request->url != $image->url){
				Storage::delete($image->url);
				$image->url = $request->file('url')->store('public/images');
			}
			$image->save();

			return redirect()->action('ImageController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
			$file = $image->url;
			Storage::delete($file);
			$image->delete();
			return redirect()->action('ImageController@index');

    }
}
