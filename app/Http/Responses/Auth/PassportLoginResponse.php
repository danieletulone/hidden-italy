<?php

namespace App\Http\Responses\Auth;

use App\Exceptions\Auth\NoTokenProvidedException;
use Illuminate\Contracts\Support\Responsable;

class PassportLoginResponse implements Responsable
{
    private const HTTP_CODE = 201;

    /**
     * The user instance.
     *
     * @var [type]
     */
    protected $user;

    /**
     * The token generated.
     *
     * @var [type]
     */
    protected $token;

    /**
     * Undocumented function
     * 
     * @throws NoTokenProvidedException
     * @param [type] $user
     * @param [type] $token
     */
    public function __construct($user, $token)
    {
        $this->user = $user;

        throw_if(
            $token == null,
            new NoTokenProvidedException()
        );

        $this->token = $token;
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
            "token" => $this->token
        ], self::HTTP_CODE);
    }
}