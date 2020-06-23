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
}
