<?php

namespace App\Http\Responses\Auth;

use Illuminate\Contracts\Support\Responsable;

class PassportRevokeResponse implements Responsable
{
    private const HTTP_CODE = 200;

    /**
     * The response to return.
     *
     * @param [type] $request
     * @return void
     */
    public function toResponse($request)
    {
        return response([
            "revoked" => true
        ], self::HTTP_CODE);
    }
}