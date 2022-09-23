<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\Transaction;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //return users
        $getUsers = new User();
        $users = $getUsers->newQuery()->where('is_admin', '=', 0)->limit(6)->get();
        $num_users = User::where('is_admin', '=', 0)->count();
        //return withdrawals
        $getWithdrawals = new Transaction();
        $withdrawals = $getWithdrawals->newQuery()->where('type', 'withdrawal')->limit(6)->get();
        $num_withdrawals = Transaction::where('type', 'withdrawal')->count();
        //return deposits
        $getDeposits = new Transaction();
        $deposits = $getDeposits->newQuery()->where('type', 'deposit')->limit(6)->get();
        $num_deposits = Transaction::where('type', 'deposit')->count();
        //return buy trades
        $getBuyTrades = new Trade();
        $buyTrades = $getBuyTrades->newQuery()->where('type', 'buy')->limit(6)->get();
        $num_buyTrades = Transaction::where('type', 'buy')->count();
        //return sell trades
        $getSellTrades = new Trade();
        $sellTrades = $getSellTrades->newQuery()->where('type', 'sell')->limit(6)->get();
        $num_sellTrades = Transaction::where('type', 'buy')->count();
        

        return inertia('admin.index', [
            'users' => $users,
            'user_count' => $num_users,
            'withdrawals' => $withdrawals,
            'withdrawals_count' => $num_withdrawals,
            'deposits' => $deposits,
            'deposits_count' => $num_deposits,
            'buyTrades' => $buyTrades,
            'num_buyTrades' => $num_buyTrades,
            'sellTrades' => $sellTrades,
            'num_sellTrades' => $num_sellTrades,
        ]);
    }
}
