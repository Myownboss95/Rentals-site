<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $cart = session()->get('cart', []);
        if($cart !== null){
        
        foreach ($cart as $carts) {
            $event->user->userCart()->create($carts);
        }
        $event->user->refresh();
        }
    }
    
}
