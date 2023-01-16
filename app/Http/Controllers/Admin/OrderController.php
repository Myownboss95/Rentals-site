<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Models\User;
use App\Models\Order;
use App\Mail\OrdersDue;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\SendEmailMailable;
use App\Mail\Transaction\Approved;
use App\Mail\Transaction\Declined;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = OrderItem::latest()->with(['products','user','order'])->where('return_request', 1);
        
        return inertia('admin.orders.refund', [
            'orders' => $orders->paginate(),
        ]);
    }
    public function all_orders(Request $request)
    {
        $order = new Order();
        $query = $order->newQuery()->with(['order_items.products','user']);
        // dd($query->user());
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where([
                ['reference', 'LIKE', "%$search%"],
            ]);
            $query->orWhere([
                ['amount', 'LIKE', "%$search%"],
            ]);

            // $query->orWhereHas('user', function ($query) use ($search){
            //     $query->where([
            //         ['first_name', 'like', '%'.$search.'%'],
            //         ['last_name', 'like', '%'.$search.'%'],
                    
            //     ]);
            // })->with(['user' => function($query) use ($search){
            //     $query->where([
            //         ['first_name', 'like', '%'.$search.'%'],
            //         ['last_name', 'like', '%'.$search.'%'],
                    
            //     ]);
            // }]);

            $query->orWhereHas('user', function ($query) use ($search){
                $query->where('first_name', 'like', '%'.$search.'%')->orWhere('last_name', 'like', '%'.$search.'%');
            });

            $query->orWhereHas('order_items', function($query) use($search){
                $query->whereHas('products', function($q) use($search){
                    $q->where('name', 'like', '%'.$search.'%')->orWhere('rent_price', 'like', '%'.$search.'%');
                });
            });

            // $query->whereRelation('order_items.products','name', 'like', '%'.$search.'%');
          
           
            
            
        }
        $all_orders = Order::with(['order_items.products','user'])->latest()->paginate(10);
        // dd($all_orders);
        
        // dd($query->get());
        return inertia('admin.orders.index', ['user_orders' => $query->paginate()->through(function ($orders, $key) {
            return $orders;
        })->withQueryString(),]);
    }
    public function approve($id)
    {
        $order_refund = OrderItem::findOrFail($id)?->load('user');
        $user = $order_refund->user;
        $order_refund->return_confirmed = 1;
        $order_refund->save();
        // Mail::to($user)->send(new Approved($user, $order_refund));
        session()->flash('success', 'Return approved');
        return back();
    }

    public function decline($id)
    {
        $order_refund = OrderItem::findOrFail($id)?->load('user');
        $user = $order_refund->user;
        $order_refund->return_confirmed = 0;
        $order_refund->save();
        // Mail::to($user)->send(new Approved($user, $order_refund));
        session()->flash('danger', 'Return Declined');
        return back();
    }
    public function due_products(){
        $expired_products = OrderItem::with(['products', 'user','order'])->where('rent_stop','<', Carbon::now())->
        latest()->paginate(5);
        $users = User::all();
        return inertia('admin.orders.expired', [
            'expired_products' => $expired_products,
            'users' => $users
        ]);
    }
    public function send($id, $email, $message)
    {
        // $request->validate([
        //     'email' => ['required', 'exists:users,email'],
        //     'message' => ['required', 'string'],
        // ]);

        $user = User::whereEmail($email)->first();
        $orderItem = OrderItem::find($id);
        // dd($user);
        Mail::to($user)
            ->send(
                new OrdersDue(
                    $user, $message, $orderItem
                )
            );
        session()->flash('success', 'Email sent successfully');
        return back();
    }
}
