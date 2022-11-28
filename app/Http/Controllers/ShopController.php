<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //

    public function index(){
        $pagination = 5;
        if(request()->category) {
            $category = Category::where('slug', request()->category)->get()->first();
            $products = Product::where('category_id', $category->id);
            $categoryName = $category->name;
        }
        //  else if(request()->tag) {
        //     $tag = Tag::where('slug', request()->tag)->get()->first();
        //     $products = $tag->products();
        //     $tagName = $tag->name;
        // } 
        else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }
        if(request()->sort == 'low_high') {
            $products = $products->orderBy('rent_price')->paginate($pagination);
        } else if(request()->sort == 'high_low') {
            $products = $products->orderBy('rent_price', 'desc')->paginate($pagination);
        } else {
            $products = $products->inRandomOrder()->paginate($pagination);
        }
        $categories = Category::all();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('front.shop')->with([
            'products' => $products,
            'categories'=> $categories,
            'cart'=> $cart,
        // 'categoryName' => $categoryName ?? null,
        //     'tagName' => $tagName ?? null
            ]);
    }
    public function show( $slug)
    {
        //
        $user = (Auth::check()==true)? User::find(auth()->user()->id): null;

        Paginator::useBootstrap();
        $product = Product::where('slug', $slug)->firstOrFail();
        // dd($product->images);
        $images = $product->images;
        // $wishlist = Wishlist::where('user_id', auth()->user()->id)->pluck('id')->toArray();
        
        // where('slug', '!=', $product->slug)->
        if(!is_null($user)){
            // $user->wishlist->products;
                $mightLike = $user->wishlist->products()->orWhere('category_id', $product->category_id)->mightAlsoLike()->get();
        }
        else{
            $mightLike = Product::where('slug', '!=', $product->slug)->orWhere('category_id', $product->category_id)->mightAlsoLike()->get();
        }

        // dd($mightLike);
        $stockLevel = getStockLevel($product->quantity);
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('front.product')->with([
            'product' => $product,
            'mightLike' => $mightLike,
            'images' => $images,
            'stockLevel' => $stockLevel,
            'cart' => $cart
        ]);
    }
    public function search(Request $request){
            // return $request->input();
            $products = Product::where('name', 'like','%'.$request->input('item').'%')->orWhere('details', 'like','%'.$request->input('item').'%')
            ->orWhere('description', 'like','%'.$request->input('item').'%')
            ->paginate(10);
            $categories = Category::all();
            $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

            return view('front.search')->with([
                'products' => $products,
                'categories'=> $categories,
                'cart'=> $cart,
            // 'categoryName' => $categoryName ?? null,
            //     'tagName' => $tagName ?? null
                ]);
    }
    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));

        return response()->json([
            'status' => 'added'
        ]);
    }
}
