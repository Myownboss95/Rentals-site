<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Paystack;

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
        // dd($carts);
        $paymentDetails = Paystack::getPaymentData();
        // dd($paymentDetails);
        
        $order = $user->orders()->create([
            "amount" => $paymentDetails['data']['amount'],
            "reference" => $paymentDetails['data']['reference'],
        ]);
        foreach ($carts as $cart) {
            # code...
            $order->order_items()->create([
                "products_id" => $cart->product_id,
                "quantity" => $cart->quantity,
                "amount" => $cart->rent_price,
                "rent_duration" => $cart->rent_duration
            ]);
        }
        session()->flash('success', 'Items Purchased Successfully');
        return redirect()->route('user.index');
        
    }

}
