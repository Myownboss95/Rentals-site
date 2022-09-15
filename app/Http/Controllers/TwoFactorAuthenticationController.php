<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthenticationController extends Controller
{
    public function __invoke()
    {

        $user = User::findOrFail(auth()->user()->id);
        $status = !empty($user->two_factor_secret) && !empty($user->two_factor_recovery_codes);
        $recoveryCodes = $status === true ? optional($user)->recoveryCodes() : [];
        $qrCodeSvg = $status ? (string) $user->twoFactorQrCodeSvg() : '';
        $confirmed = !is_null($user->two_factor_confirmed_at);
        return inertia('security.two-factor-auth', [
            'auth.user.two_factor_auth_status' => $status,
            'auth.user.two_factor_recovery_codes' => $recoveryCodes,
            'auth.user.two_factor_qr_code_svg' => $qrCodeSvg,
            'auth.user.two_factor_status' => $confirmed,
        ]);
    }
}
