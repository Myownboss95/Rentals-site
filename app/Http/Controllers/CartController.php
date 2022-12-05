<?php


namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];
        // dd($cart);

        return view('front.cart')->with(['cart' => $cart]);
    }    

    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));
        $cartJ = json_encode($request->post('cart')) ;
        $cart = json_decode($cartJ, true) ;
        if(Auth::check()) {
            $user = User::findOrFail(auth()->user()->id);
            try {
                //code...
                $user->userCart()->create([]);
                $user->refresh();
            } catch (\Throwable $th) {
                throw $th.$cart;
            }
            return $cart;
            // 
        }

        return response()->json([
            'status' => 'Added to Cart',
            'cart' => $cart
        ]);
    }
}