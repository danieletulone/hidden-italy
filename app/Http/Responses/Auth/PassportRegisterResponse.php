<?php

namespace App\Http\Responses\Auth;

use Illuminate\Contracts\Support\Responsable;

class PassportRegisterResponse implements Responsable
{
    private const HTTP_CODE = 201;

    /**
     * The user instance.
     *
     * @var [type]
     */
    protected $user;

    /**
     * Undocumented function
     * 
     * @param [type] $user
     * @param [type] $token
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * The response to return.
     *
     * @param [type] $request
     * @return void
     */
    public function toResponse($request)
    {
        return response([
            "user" => $this->user,
        ], self::HTTP_CODE);
    }
}