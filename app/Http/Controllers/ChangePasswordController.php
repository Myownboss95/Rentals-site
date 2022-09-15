<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use DB;
use Hash;

class ChangePasswordController extends Controller
{
    public function getChangePasswordView()
    {
        return inertia('security.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::findOrFail(auth()->user()->id);

        if (!Hash::check($request->input('old_password'), $user->password)) {
            return back()->withErrors(['error' => 'The provided old password does not match your current password']);
        }

        if (Hash::check($request->input('password'), $user->password)) {
            return back()->withErrors(['error' => 'Password cannot be same as your old password']);
        }
        DB::beginTransaction();
        try {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return back()->withSuccess('Password changed successfully');
    }
}
