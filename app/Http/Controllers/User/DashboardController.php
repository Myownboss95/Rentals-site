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
use Carbon\Carbon;

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
        $user_orders = $user->orders()->with('order_items.products')->latest()->limit(2)->get();
        // dd($user_orders);
       //return deposits
        $deposits = $user->transactions()->where('type', 'deposit')->limit(6)->latest()->get();
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
        $user_orders = $user->orders()->with('order_items.products')->latest()->paginate(5);
        // dd($user_orders);
        return inertia('user.orders', ['user_orders' => $user_orders]);
    }
    public function my_rented_products(){
        $user = User::findOrFail(auth()->user()->id);
        $user_rented = $user->order_items()->with('products')->latest()->paginate(5);
        // dd($user_rented);
        return inertia('user.rented', ['user_rented' => $user_rented]);
    }
    public function my_expired_products(){
        $user = User::findOrFail(auth()->user()->id);
        $user_rented = $user->order_items()->with('products')->where('rent_stop','<', Carbon::now())->
        latest()->paginate(5);
        // dd($user_rented);
        return inertia('user.expired', ['user_rented' => $user_rented]);
    }
    public function return_product(Request $request, $id){
        $user = User::findOrFail(auth()->user()->id);
        $order_refund =  $user->order_items()->find($id);
        $order_refund->return_request = 1;
        $order_refund->save();
        session()->flash('success', 'Request Sent, awaiting Confirmation');
        return back();
    }

}
