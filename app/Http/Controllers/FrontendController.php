<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class FrontendController extends Controller
{
    public $theme;
    public function __construct()
    {
        $this->theme = config('app.theme', 'front');
    }
    public function home() 
    {
        $cart = session()->get('cart');
        if ($cart == null) $cart = [];
        $setting = Settings::first();
        $categories = Category::paginate();
        $products = Product::latest()->where('rent_status', 1)->where('featured', 1)->with('category')->limit(6)->get();
        return view("$this->theme.home", compact('setting', 'products', 'categories','cart'));
    }

    public function about()
    {
        return view("$this->theme.about-us");
    }


    public function contact()
    {
        return view("$this->theme.contact");
    }

    public function terms_and_conditions()
    {
        return view("$this->theme.terms-and-conditions");
    }

    public function faqs()
    {
        return view("$this->theme.faqs");
    }
}
