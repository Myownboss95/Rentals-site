<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $query = Wishlist::latest()->where('user_id', auth()->user()->id);whereHas('wishlist', function($query) use($user) {
                //     return $query->where('user_id', $user );
                // }
                // )
        $user = User::findOrFail(auth()->user()->id);
        // $wishlists = $user->wishlist()->latest()->paginate();
        // $wishlists = Product::whereHas('wishlist', function($query) use($user_id) {
        //     return $query->where('user_id', $user_id );
        // }
        // )->paginate();



        return inertia('user.wishlist.index', [
            'wishlists' => $user->wishlist->products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $user = User::findOrFail(auth()->user()->id);
        $product_id = Product::where('slug', $slug)->value('id');
        if(is_null($user->wishlist)){
            $user->wishlist()->create([]);
            $user->refresh();
        }
        if(DB::table('product_wishlist')->where('product_id',$product_id)->exists()){
            return redirect()->back()->with('message', 'Already in Wishlist');
        }

        $user->wishlist->products()->attach([
            'product_id' => $product_id  
        ]);
        return redirect()->back()->with('message', 'Added to Wishlist');

        
        
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        auth()->user()->wishlist->products()->detach($product_id);
        session()->flash('success', 'Wishlist Deleted successfully');
        return redirect()->route('user.wishlist.index');
    }
}
