<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //
    public function check(Request $request, $id)
    {
        $request->session()->put('data', ['regToken' => $id]);
        return redirect()->route('register');
    }
}
