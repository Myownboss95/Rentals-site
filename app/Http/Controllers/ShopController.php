<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

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
        return view('front.shop')->with([
            'products' => $products,
            'categories'=> $categories,
            // 'tags'=> $tags,
        'categoryName' => $categoryName ?? null,
            'tagName' => $tagName ?? null
            ]);
    }
    public function show( $slug)
    {
        //
        Paginator::useBootstrap();
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
    public function search(Request $request){
            // return $request->input();
            $products = Product::where('name', 'like','%'.$request->input('item').'%')->orWhere('details', 'like','%'.$request->input('item').'%')
            ->orWhere('description', 'like','%'.$request->input('item').'%')
            ->paginate(10);
            $categories = Category::all();
            return view('front.search')->with([
                'products' => $products,
                'categories'=> $categories,
                // 'tags'=> $tags,
            // 'categoryName' => $categoryName ?? null,
            //     'tagName' => $tagName ?? null
                ]);
    }
}
