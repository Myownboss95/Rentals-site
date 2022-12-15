<?php


namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {   
        $cart = [];
        $categories = Category::all();
        if (Auth::check()){
            $user = User::findOrFail(auth()->user()->id);
            $cart=  $user->userCart()->get();
        }elseif(session()->exists('cart')){
        $cart = session()->get('cart');
        }
        else{

        }
        
        // dd($cart);

        return view('front.cart')->with([
            'cart' => $cart,
            'categories' => $categories
        ]);
    }

    public function addToCart(Request $request)
    {
        $id= $request->input('id');
        $quantity= $request->input('quantity');
        $rent_duration= $request->input('rent_duration');
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

         if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            if (Auth::check()) {
            
                $user = User::findOrFail(auth()->user()->id);
                  foreach ($cart as $carts) {
                        // $cartC = Cart::where('slug', $carts['slug'])->userCart()->first();
                      $user->userCart()->create($carts);
                    }
                    $user->refresh();
                }

        } else {
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $quantity,
            "rent_price" => $product->rent_price,
            "image" => $product->image,
            "slug" => $product->slug,
            // "user_id" => auth()->user()->id,
            "category" => $product->category->name,
            "rent_duration" => $rent_duration
        ];
        session()->put('cart', $cart);
        if (Auth::check()) {
            
            $user = User::findOrFail(auth()->user()->id);
              foreach ($cart as $carts) {
                  $user->userCart()->create($carts);
                }
                $user->refresh();
            }
        }
        
        // dd($cart);

        

        return response()->json([
            'status' => 'Added to Cart',
            'cart' => $cart
        ]);
    }
    public function update(Request $request)

    {

        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)

    {
        
        if($request->slug) {

            $cart = session()->get('cart');

            if(isset($cart[$request->slug])) {

                unset($cart[$request->slug]);

                session()->put('cart', $cart);

            }
            if(Auth::check()){
                $user = User::findOrFail(auth()->user()->id);
                $cart = $user->usersCart()->where('slug', $request->slug)->where('quantity',$request->quantity)->first();
                $cart->delete();
            }

            return response()->json([
                'status' => 'Product removed successfully',
                'cart'=> 'yes'
            ]);

            
            session()->flash('success', 'Product removed successfully');

        }
        // return response()->json([
        //     'status' => 'Product removed successfully',
        //     'cart'=> $request->id]);

    }


}
