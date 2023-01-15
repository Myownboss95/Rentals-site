<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Trade;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\OrderItem;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        //return main account balance
        $user = User::findOrFail(auth()->user()->id);
        $userMainBalance = $user->accountBalance();

        //return orders
        // $user_orders = $user->orders()->whereHas('order_items', function($query) 
        // {
        //     return $query->with('products')->get();
        // })->get();
        $user_orders = $user->orders()->with('order_items.products')->limit(2)->get();
        
       //return deposits
        $deposits = $user->transactions()->where('type', 'deposit')->limit(6)->get();
        $num_deposits = $user->transactions()->where('type', 'deposit')->count();
       
       return inertia('user.index', [
            'userMainBalance' => $userMainBalance,
            'user_orders' => $user_orders,
            'deposits' => $deposits,
            'deposits_count' => $num_deposits,
            
        ]);
    }

    public function my_orders(){
        $user = User::findOrFail(auth()->user()->id);
        $user_orders = $user->orders()->with('order_items.products')->paginate(5);
        // dd($user_orders);
        return inertia('user.orders', ['user_orders' => $user_orders]);
    }
}
