<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Trade;
use App\Models\Tradeable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TradeController extends Controller
{
    public function index()
    {
        $query = Trade::latest()->where('user_id', auth()->user()->id)->with('tradeable');

        return inertia('user.trades.index', [
            'trades' => $query->paginate(),
        ]);
    }


    public function trades()
    {
        return inertia('user.trades.trades');
    }

    public function getTradeables($type)
    {
        $tradeables = [];
        Tradeable::where('type', $type)
            ->get(['id', 'name'])
            ->map(function ($item) use (&$tradeables) {
                $tradeables[$item->id] = $item->name;
            });
        return response()->json(['data' => $tradeables]);
    }


    public function store(Request $request)
    {
        $this->middleware('active');
        $data = $request->validate(['amount' => ['required', 'numeric'],
            'type' => ['required', 'in:buy,sell'],
            'stop_loss' => ['nullable'],
            'tradeable_id' => ['required', 'numeric'],
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $account = $user->accounts()->where('type', 'invested')->first();

        $subscription = $user->subscriptions()->where('status', 'active')->first();

        if (!$subscription) {
            // session()->flash('error', 'You do not have an active subscription plan');
            return redirect()->route('user.subscriptions.plans')
                ->withError('You do not have an active subscription plan');
        }

        if ($request->input('amount') > $account->account) {
            session()->flash('error', 'You have insufficient funds to continue this trade');
            return redirect()->route('user.subscriptions.plans');
        }
        $user->trades()->create(array_merge($data,['status' => 'active', ]));

        session()->flash('success', 'Trade placed successfully');
        return redirect()->route('user.trades.index');
    }

    public function close(Trade $trade)
    {
        $trade->close();
        session()->flash('success', 'Trade closed');
        return back();
    }
}
