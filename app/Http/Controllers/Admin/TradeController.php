<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tradeable;
use App\Models\User;

class TradeController extends Controller
{
    public function index()
    {
        $trades = Trade::with(['tradeable', 'user'])->latest();

        return inertia('admin.trades.index', [
            'trades' => $trades->paginate(),
        ]);
    }

    public function trades()
    {
        return inertia('admin.trades.trades');
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
        $data = $request->validate([
            'amount' => ['required', 'numeric'],
        ]);
        $data = $request->all();
        $user = User::findOrFail(auth()->user()->id);
        $user->trades()->create(array_merge($data,['status' => 'active', ]));
    }

    public function update(Request $request, Trade $trade)
    {
        $data = $request->validate([
            'returns' => ['required', 'numeric']
        ]);
        $trade->update($data);
        session()->flash('success', 'Updated Trade');
        return back();
    }

    public function close(Trade $trade)
    {
        $trade->close();
        session()->flash('success', 'Trade closed');
        return back();
    }
}
