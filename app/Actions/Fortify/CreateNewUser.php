<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Events\CreateUserAccounts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'referral_code' => ['nullable','string']
        ])->validate();

        $user = User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'referral_code' => substr($input['email'],0,3).Str::random(3)
        ]);
        if(isset($input['referral_code'])){
            
            $refferedUser = User::where('referral_code', $input['referral_code'])->first();
            if($refferedUser){
                // dd($refferedUser->id);
            $user->update([
                'referrer_id' => $refferedUser->id
            ]);
            }
        }
        event(new CreateUserAccounts($user));
        return $user;
    }

    
}
