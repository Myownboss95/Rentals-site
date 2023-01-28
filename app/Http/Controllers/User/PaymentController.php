<?php

namespace App\Http\Controllers\User;

use Paystack;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    //
      /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {   
        
        $order_id = Str::upper(Str::random(6).rand(100,999).Str::random(2));
        // while (Order::where('reference', $order_id)->exists()) {
        //     $order_id = Str::random(6).rand(100,999).Str::random(2);
        // }
        $user = User::findOrFail(auth()->user()->id);
        $data = $request->validate([
            'amount' => ['required', 'numeric']
        ]);
        $amount = number_format((float)$request->input('amount'), 2, '.', '');
         $values = array_merge($data, [
        "amount" => $amount,
        "currency" => "NGN",
        "orderID" => $order_id,
        "email" => $user->email,
        'reference' => Paystack::genTranxRef()
            ]);
    // dd($values);
        try{
            return Paystack::getAuthorizationUrl($values)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $user = User::find(auth()->user()->id);
        $carts=  $user->userCart()->get(); 
        $paymentDetails = Paystack::getPaymentData();
        
        $order = $user->orders()->create([
            "amount" => number_format($paymentDetails['data']['amount'], 2, '.','') ,
            "reference" => $paymentDetails['data']['reference'],
        ]);
        foreach ($carts as $cart) {
            # code...
            $order->order_items()->create([
                "user_id" => $user->id,
                "products_id" => $cart->product_id,
                "quantity" => $cart->quantity,
                "amount" => $cart->rent_price,
                "rent_duration" => $cart->rent_duration,
                "rent_start" => Carbon::today(),
                "rent_stop" =>Carbon::today()->copy()->addDays($cart->rent_duration)
            ]);
        }
        $user->userCart()->delete();
        session()->forget('cart');
        session()->flash('success', 'Items Purchased Successfully');
        return redirect()->route('user.index');
        
    }

    public function pay_via_account_funds(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $account = $user->accounts()->first();
        $balance = $account?->account ?? 0;

        $request->validate([
            'amount' => ['required', 'numeric']
        ]);
        $amount = number_format((float)$request->input('amount'), 2, '.', '');
        $order_id = Str::upper(Str::random(10).rand(10000,99999).Str::random(5).rand(10000,99999));
        
        $carts=  $user->userCart()->get(); 
        if ($balance >= $amount) {
            $order = $user->orders()->create([
                "amount" => $amount,
                "reference" => $order_id,
            ]);
            foreach ($carts as $cart) {
                # code...
                $order->order_items()->create([
                    "user_id" => $user->id,
                    "products_id" => $cart->product_id,
                    "quantity" => $cart->quantity,
                    "amount" => $cart->rent_price,
                    "rent_duration" => $cart->rent_duration,
                    "rent_start" => Carbon::today(),
                    "rent_stop" =>Carbon::today()->copy()->addDays($cart->rent_duration)
                ]);
            }
            $user->userCart()->delete();
            $account->account -= $amount;
            $account->save();
            session()->forget('cart');
            session()->flash('success', 'Items Purchased Successfully');
            return redirect()->route('user.orders');
         }
         else{
            session()->flash('error', 'Insufficient Account Balance, Please Top Up or Use Paystack');
            return redirect()->route('user.deposits.create');
         }
       
    }

}
