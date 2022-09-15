<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Kyc\Approved;
use App\Mail\Kyc\Declined;
use App\Services\LocationService;
use Mail;

class KycController extends Controller
{
    public function index()
    {
        $service = new LocationService();

        $query = User::with(['documents'])
            ->where('is_admin', 0)
        ->where('status', 'pending');
        if (config('app.id_verification')) {
            $query = $query->whereHas('documents');
        }
        $users = $query->paginate()
            ->through(function (User $user) use ($service) {
                $user->state = $service->getState($user->country, $user->state);
                $user->country = $service->getCountry($user->country);
                return $user;
            });
        return inertia('admin.users.kyc', [
            'users' => $users
        ]);
    }

    public function approve(User $user)
    {
        $user->update([
            'status' => 'active'
        ]);
        Mail::to($user)->send(new Approved($user));
        session()->flash('success', 'User approved');
        return back();
    }


    public function decline(User $user)
    {
        $user->update([
            'status' => 'active'
        ]);
        session()->flash('success', 'User declined');
        Mail::to($user)->send(new Declined($user));
        return back();
    }
}
