<?php

namespace App\Listeners;

use App\Events\CreateUserAccounts as EventsCreateUserAccounts;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserAccounts
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
    public function handle(EventsCreateUserAccounts $event)
    {
        $user = $event->user;
        $user->generateAccounts();
    }
}
