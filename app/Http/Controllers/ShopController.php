<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function show( $slug)
    {
        //
        $product = Product::where('slug', $slug)->firstOrFail();
        // dd($product->images);
        $images = $product->images;
        $mightLike = Product::where('slug', '!=', $product->slug)->mightAlsoLike()->get();
        // dd($mightLike);
        $stockLevel = getStockLevel($product->quantity);
        return view('front.product')->with([
            'product' => $product,
            'mightLike' => $mightLike,
            'images' => $images,
            'stockLevel' => $stockLevel
        ]);
    }
}
