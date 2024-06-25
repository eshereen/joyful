<?php

namespace App\Listeners;

use App\Events\CancelledEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\CancelledShipmentEmail as MailCancelledShipmentEmail;


class CancelledShippmentListener
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
     * @param  CancelledEvent  $event
     * @return void
     */
    public function handle(CancelledEvent $event)
    {
        Mail::to($event->order->email)->send(new MailCancelledShipmentEmail($event));
    }
}
