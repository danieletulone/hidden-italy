<?php

namespace App\Http\Controllers;

use App\Helpers\ScopeHelper;
use App\Http\Requests\ScopeRequest;
use App\Models\Scope;

class ScopeController extends Controller
{
    /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        return view('admin.scopes.index', [
            'scopes' => Scope::paginate()
        ]);
    }

    /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function show(Scope $scope)
    {
        return view('admin.scopes.show')->with('scope', $scope);
    }

    /**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function create()
    {
        return view('admin.scopes.create');
    }

    /**
    * Store a newly created resource in storage.
    * 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(ScopeRequest $request)
    {
        Scope::create($request->all());

        ScopeHelper::reset();

        return redirect()->action('ScopeController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @author Andrea Arizzoli <andrea.arizzoli@ied.edu>
     * 
     * @param  \App\Models\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function edit(Scope $scope)
    {
        return view('admin.scopes.edit')->with('scope', $scope);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scope  $scope
     * @return \Illuminate\Http\Response
     */
    public function update(ScopeRequest $request, Scope $scope)
    {
        Scope::where('id', $scope->id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return redirect()->action('ScopeController@index');
    }

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Scope $scope)
	{
		$scope->delete();

		return redirect()->action('ScopeController@index');
	}
}
