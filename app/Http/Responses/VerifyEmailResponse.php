<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\VerifyEmailResponse as VerifyEmailResponseContract;


class VerifyEmailResponse implements VerifyEmailResponseContract
{
    public function toResponse($request)
    {
        return redirect()->route('email.verified');
    }
}
