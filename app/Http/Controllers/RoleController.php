<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Scope;
use Illuminate\Http\Request;

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
}
