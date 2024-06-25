<?php

namespace App\Listeners;

use App\Mail\OrderConfirmed;
use App\Events\ConfirmedOrderEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmedOrderListener
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
     * @param  ConfirmedOrderEvent  $event
     * @return void
     */
    public function handle(ConfirmedOrderEvent $event)
    {
        Mail::to($event->order->user->email)->send(new OrderConfirmed($event));

    }
}
