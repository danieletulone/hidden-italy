<?php

namespace App\Http\Controllers;

use App\Models\Monument;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;
use App\http\Requests\MonumentRequest;
use App\Models\MonumentCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MonumentController extends Controller
{

    public function saveCategories($request, $monument)
    {
        $monumentCategories = MonumentCategory::get()->where('monument_id', $monument->id);

        foreach ($monumentCategories as $monumentCategory) {
            $monumentCategory->delete();
        }

        if ($request->categories != null && count($request->categories) > 0) {
            foreach ($request->categories as $category) {
                MonumentCategory::create([
                    'monument_id' => $monument->id,
                    'category_id' => $category
                ]);
            }
        }
    }

    /**
     * Get filtered and paginated admin.monuments.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * @author Andrea Arizzoli
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('description', 'asc')->get();

        $monuments = Monument::with('categories');

		if (request()->has('category_id')){
			$monuments = $monuments->where('category_id', $request->category_id);
        }

        if (request()->has('search')){
			$monuments = $monuments->where('name', 'like', '%' .$request->search .'%');
        }

        if (request()->has('name')){
			$monuments = $monuments->orderBy('name', $request->name);
        }

        if (request()->has('id')){
			$monuments = $monuments->orderBy('id', $request->id);
        } else {
            $monuments = $monuments->orderBy('id', 'DESC');
        }

        if (request()->has('visible')){
			$monuments = $monuments->where('visible', $request->visible);
        }

        $monuments = $monuments->paginate()->appends($request->all());

        return view('admin.monuments.index')
            ->with('categories', $categories)
            ->with('monuments', $monuments)
            ->with('filter', $request);
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

        return view('admin.monuments.create')
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
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
			'visible' => $request->input('visible') ? true : false,
            'user_id' => '1',  // Auth::id()
            'category_id' => $request->input('main_category_id'),
        ]);

        $this->saveCategories($request, $monument);

        foreach ($request->file('url') as $image) {
            Image::create([
                'title' => $request->input('name'),
                'description' => 'Descrizione non disponibile',
                'url' =>  $image->store('public/images'),
                'monument_id' => $monument->id,
                'user_id' => '1', // Auth::id()
            ]);
        };

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
        return view('admin.monuments.show')->with('monument', $monument);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function edit(Monument $monument)
    {
        $categories = Category::get()->pluck('description', 'id');
        $monumentCategories = MonumentCategory::get()->where('monument_id', $monument->id);

        return view('admin.monuments.edit')
            ->with('categories', $categories)
            ->with('monumentCategories', $monumentCategories)
            ->with('monument', $monument)
            ->with('selectedCategories', $monumentCategories->pluck('category_id')->toArray());

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
            'visible' => $request->input('visible') ? true : false,
            'category_id' => $request['main_category_id'],
            'user_id' => '1',  //Auth::id()
        ]);

        $this->saveCategories($request, $monument);

        if ($request->file('url') != null) {
            foreach ($request->file('url') as $image_path) {
                Image::create([
                    'title' => $request->input('name'),
                    'description' => 'Descrizione non disponibile',
                    'url' => $image_path->store('public/images'),
                    'monument_id' => $monument->id,
                    'user_id' => '1', // Auth::id()
                ]);
            }
        }

        return redirect()->action('MonumentController@index');
    }

    /**
     * Remove an image.
     */
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete($image->url);
        $image->delete();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monument  $modelsMonument
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monument $monument)
    {
        foreach ($monument->images as $image) {
            $image_path = $image->url;
            if (Storage::exists($image_path)) {
                Storage::delete($image_path);
            }
        }

        $monument->delete();

        return redirect()->action('MonumentController@index');
    }
}
