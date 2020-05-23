<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PassportLoginRequest;
use App\Http\Requests\Auth\PassportRegisterRequest;
use App\Http\Responses\Auth\PassportLoginResponse;
use App\Http\Responses\Auth\PassportRegisterResponse;
use App\Http\Responses\Auth\UnauthorisedResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassportController extends Controller
{
    /**
     * Get credentials from request.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param PassportLoginRequest $request
     * @return void
     */
    public function getCredentials(PassportLoginRequest $request)
    {
        return $request->only([
            'email',
            'password'
        ]);
    }
    
    /**
     * Generate token for user with Passport.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $user
     * @return void
     */
    public function generateToken($user)
    {
        return $user->createToken('HiddenItaly')->accessToken;
    }

    /**
     * Login a user. If authenticated return a new token.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param PassportLoginRequest $request
     * @return void
     */
    public function login(PassportLoginRequest $request)
    {
        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $this->generateToken($user); 
            
            return new PassportLoginResponse($user, $token);
        } else { 
            return new UnauthorisedResponse(); 
        }
    }

    /**
     * Register a user.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param PassportRegisterRequest $request
     * @return void
     */
    public function register(PassportRegisterRequest $request)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return new PassportRegisterResponse($user);
    }
}
