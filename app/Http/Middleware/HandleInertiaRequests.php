<?php

namespace App\Http\Middleware;

use App\Models\User;
use Inertia\Middleware;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return vite()->getHash();
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $user = auth()->check() ? User::findOrFail($request->user()->id) : null;
        return array_merge(parent::share($request), [
            'app.locale' => app()->getLocale(),
            'auth.user' => function () use ($request, $user) {
                if (!$user) return null;
                return $user->only('id', 'is_admin', 'email', 'first_name', 'last_name', 'phone', 'image');
            },
            'admin_id' => fn () => $request->session()->get('admin_id'),
            'flash.status' => fn () => $request->session()->get('status'),
            'flash.success' => fn () => $request->session()->get('success'),
            'flash.error' => fn () => $request->session()->get('error'),
            'flash.email' => fn () => $request->session()->get('email'),
            'validated' => fn () => $request->session()->get('validated'),
            'data' => fn () => $request->session()->get('data'),
            'url.previous' => function () {
                return (url()->current() != route('login')
                    && url()->previous() !== ''
                    && url()->previous() != url()->current())
                    ? url()->previous()
                    : null;
            },
        ]);
    }
}
