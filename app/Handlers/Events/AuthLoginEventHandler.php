<?php

namespace App\Handlers\Events;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Support\Facades\Log;


class AuthLoginEventHandler
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
     * @param  Login  $event
     * @return void
     */

    // The event listener receives the event instance in the handle method.
    public function handle(Login $event)
    {
        Log::info('Logged in');
        $user = auth()->user();
        $user->number_of_logins++;
        $user->save();
    }
}
