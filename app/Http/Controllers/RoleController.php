<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Models\Scope;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::paginate()
        ]);
    }

    public function create()
    {
        return view('admin.roles.create', [
            'scopes' => Scope::all()
        ]);
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->all());

        return redirect()->action('RoleController@index');
    }
}
