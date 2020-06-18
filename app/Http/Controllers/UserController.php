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
        $deleted = User::findOrFail($user)->delete();

        if ($deleted) {
            return redirect()->action('UsersController@index');
        }
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
        $users = User::paginate();

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
}
