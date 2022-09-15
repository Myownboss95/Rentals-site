<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerifiedController extends Controller
{
    public function verified()
    {
        return inertia('auth.email.verified');
    }

    public function correctInfo(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $email = $user->email;
        auth()->logout();
        session()->invalidate();
        session()->regenerate();
        $user->delete();
        return redirect()->route('register')->with('email', $email);
    }
}
