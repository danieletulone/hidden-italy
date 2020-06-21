<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function edit()
    {

    }
}
