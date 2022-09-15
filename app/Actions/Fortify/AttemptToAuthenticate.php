<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Fortify;
use Illuminate\Auth\Events\Failed;
use Laravel\Fortify\LoginRateLimiter;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\AttemptToAuthenticate as ActionsAttemptToAuthenticate;

class AttemptToAuthenticate extends ActionsAttemptToAuthenticate
{
    /**
     * Throw a failed authentication validation exception.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function throwFailedAuthenticationException($request)
    {
        $this->limiter->increment($request);

        throw ValidationException::withMessages([
            'error' => [trans('auth.failed')],
        ]);
    }
}
