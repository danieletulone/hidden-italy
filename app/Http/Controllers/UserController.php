<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles is the user crud request.
    | Also provides many analytics data.
    */

    /**
     * Remove the specified resource from storage.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = User::findOrFail($user->id)->delete();

        return redirect()->action('ScopeController@index');
    }

    /**
     * Display a listing of the resource.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
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
     * @author Andrea Arizzoli <andrea.arizzoli@ied.edu>
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @author Andrea Arizzoli <andrea.arizzoli@ied.edu>
     * 
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    
}
