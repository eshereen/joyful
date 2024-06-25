<?php

namespace App\Listeners;

use App\Events\OrderRecieved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\OrderRecieved as MailOrderRecieved;

class OrderConfirmedListener
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
     * @param  OrderRecieved  $event
     * @return void
     */
    public function handle( OrderRecieved $event)
    {
        Mail::to($event->order->user->email)->send(new MailOrderRecieved($event));
    }
}
