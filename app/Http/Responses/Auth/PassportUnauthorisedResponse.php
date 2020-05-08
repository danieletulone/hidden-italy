<?php

namespace App\Http\Responses\Auth;

use Illuminate\Contracts\Support\Responsable;

class PassportUnauthorizeResponse implements Responsable
{
    private const HTTP_CODE = 401;

    public function toResponse($request)
    {
        return response([
            "message" => "Unauthorised.",
        ], self::HTTP_CODE);
    }
}