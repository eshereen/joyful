<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\OrderShipped as MailOrderShipped;


class OrderShippedListener
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
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        Mail::to($event->order->user->email)->send(new MailOrderShipped($event));

    }
}
