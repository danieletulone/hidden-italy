<?php

namespace App\Http\Controllers;

use App\Helpers\ScopeHelper;
use App\Http\Requests\ScopeRequest;
use App\Models\Scope;

class ScopeController extends Controller
{
    public function index()
    {
        return view('admin.scopes.index', [
            'scopes' => Scope::paginate()
        ]);
    }

    public function show(Scope $scope)
    {
        return view('admin.scopes.show')->with('scope', $scope);
    }

    public function create()
    {
        return view('admin.scopes.create');
    }

    public function store(ScopeRequest $request)
    {
        Scope::create($request->all());

        ScopeHelper::reset();

        return redirect()->action('ScopeController@index');
    }

    public function edit(Scope $scope)
    {
        return view('admin.scopes.edit')->with('scope', $scope);
    }

    public function update(ScopeRequest $request, Scope $scope)
    {
        Scope::where('id', $scope->id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return redirect()->action('ScopeController@index');
    }

	public function destroy(Scope $scope)
	{
		$scope->delete();

		return redirect()->action('ScopeController@index');
	}
}
