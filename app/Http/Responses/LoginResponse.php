<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;


class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $to = $request->user()->is_admin === 1 ? route('admin.index') : route('user.index');
        return redirect()->intended($to);
    }
}
