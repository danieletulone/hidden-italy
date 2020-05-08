<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PassportLoginRequest;
use App\Http\Requests\Auth\PassportRegisterRequest;
use App\Http\Responses\Auth\PassportLoginResponse;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    public function getCredentials(PassportLoginRequest $request)
    {
        return $request->only([
            'email',
            'password'
        ]);
    }

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
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }

    public function registration(PassportRegisterRequest $request)
    {
        
    }
}
