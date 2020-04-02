<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Image;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return DB::table('users')->get()->dd();
				// DB::table('users')->get();

        $users = User::orderBy('id', 'desc')->get();
				return view('users.index')
					->with('users', $users);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$roles = DB::table('roles')->get()->pluck('name', 'id');
			$images = DB::table('images')->get()->pluck('title', 'id');

			return view('users.create')
			->with('user', (new User()))
			->with('roles', $roles)
			->with('images', $images);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			// dd($request)->all();
			// User::create([
			// 	'nickname' => $request['nickname'],
			// 	'name' => $request['name'],
			// 	'surname' => $request['surname'],
			// 	'password' => $request['password'],
			// 	'points' => $request['points'],
			// 	'email' => $request['email'],
			// 	'role_id' => $request['role_id'],
			// 	'image_id' => $request['image_id'],
			// ]);

			DB::table('users')->insertGetId([
				'nickname' => $request->input('nickname'),
				'name' => $request->input('name'),
				'surname' => $request->input('surname'),
				'password' => $request->input('password'),
				'points' => $request->input('points'),
				'email' => $request->input('email')	,
				'role_id' => $request->input('role_id'),
				'image_id' => $request->input('image_id'),
	 			]);

		 return redirect()->action('UserController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
			// dd($user);

			return view('users.show', ['user' => $user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $images = DB::table('images')->get()->pluck('title', 'id');
				$roles = DB::table('roles')->get()->pluck('name', 'id');

				return view('users.edit')
					->with('images', $images)
					->with('roles', $roles)
					->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);

				DB::table('users')->where('id', $user->id)->update([
					'nickname' => $request['nickname'],
					'name' => $request['name'],
					'surname' => $request['surname'],
					'password' => $request['password'],
					'points' => $request['points'],
					'email' => $request['email'],
					'role_id' => $request['role_id'],
					'image_id' => $request['image_id'],
				]);

				return redirect()->action('UserController@index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
			$user->delete();
			return redirect()->action('UserController@index');
    }
}
