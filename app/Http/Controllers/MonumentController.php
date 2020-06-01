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
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

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

    public function index(Request $request)
    {
		$paginate = 5;
		$categories = Category::orderBy('description', 'asc')->get();
		if (request()->has('category_id')){
			$monuments = Monument::where('category_id', $request->category_id)->orderBy('id', 'DESC')->with('categories')->paginate($paginate)->appends('category_id', request('category_id'));
		} elseif (request()->has('search')){
			$monuments = Monument::where('name', 'like', '%' .$request->search .'%')->paginate($paginate)->appends('category_id', request('category_id'));
		} elseif (request()->has('name')){
			$monuments = Monument::orderBy('name', $request->name)->with('categories')->paginate($paginate)->appends('name', request('name'));
		} elseif (request()->has('id')){
			$monuments = Monument::orderBy('id', $request->id)->with('categories')->paginate($paginate)->appends('id', request('created_at'));
		} else {
			$monuments = Monument::orderBy('id', 'DESC')->with('categories')->paginate($paginate);
		}
        return view('monuments.index')
			->with('categories', $categories)
			->with('monuments', $monuments);    }

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
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
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
        $categories = Category::get()->pluck('description', 'id');
        $monumentCategories = MonumentCategory::get()->where('monument_id', $monument->id);
        return view('monuments.edit')
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
