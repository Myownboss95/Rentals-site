<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function plans()
    {
        $plans = Plan::latest()->with('features')->get();
        return inertia('user.subscriptions', [
            'plans' => $plans
        ]);
    }

    public function subscribe(Plan $plan)
    {
        $user = User::findOrFail(auth()->user()->id);
        $account = $user->accounts()->where('type', 'main')->first();
        $investedAccount = $user->accounts()->where('type', 'invested')->first();
        $amount = $account?->account ?? 0;

        if ($amount >= $plan->max_investment) {
            $account->account -= $plan->max_investment;
            $investedAccount->account += $plan->max_investment;
        } elseif ($amount <= $plan->max_investment && $amount >= $plan->min_investment) {
            $account->account -= $plan->min_investment;
            $investedAccount->account += $plan->min_investment;
        } else {
            session()->flash('error', 'You do not have enough balance to subscribe to this plan. Make a deposit');
            return redirect()->route('user.deposits.create');
        }

        $user->subscriptions()->create([
            'plan_id' => $plan->id,
            'status' => 'active',
            'expires_at' => Carbon::now()->addDays("$plan->tenure")->toDateTimeString(),
        ]);

        $account->save();
        $investedAccount->save();
        session()->flash('success', 'Subscribed successfully');
        return redirect()->route('user.index');


    }
}
