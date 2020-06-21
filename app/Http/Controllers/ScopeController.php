<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScopeRequest;
use App\Models\Scope;
use Cache;

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

        Cache::forget('scopes');

        return redirect()->action('ScopeController@index');
    }
}
