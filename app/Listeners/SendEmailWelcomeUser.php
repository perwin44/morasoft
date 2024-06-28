<?php

namespace App\Listeners;

use App\Mail\WelcomeUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailWelcomeUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WelcomeUser $event): void
    {
        //Mail::to($event->user->email)->send(new WelcomeUser($event->user));
        $user=User::find($event->user->id);
        $user->update([
            'status'=>1
        ]);
    }
}
