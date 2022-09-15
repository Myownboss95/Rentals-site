<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsOnboarded
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user->is_admin) {
            if (empty($user->first_name) || empty($user->last_name)) {
                return redirect()->route('user.onboard.address');
            }

            if (!$user->documents()->count() && config('app.id_verification')) {
                return redirect()->route('user.onboard.upload');
            }
        }

        return $next($request);
    }
}
