<?php

namespace App\Listeners;

use App\Events\DeliveredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\DeliveredShipmentEmail as MailDeliveredShipmentEmail;



class DeliveredShippmentListener
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
     * @param  DeliveredEvent  $event
     * @return void
     */
    public function handle(DeliveredEvent $event)
    {
        Mail::to($event->order->email)->send(new MailDeliveredShipmentEmail($event));
    }
}
