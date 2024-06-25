<?php

namespace App\Providers;

use App\Events\CancelledEvent;
use App\Events\ConfirmedOrderEvent;
use App\Events\DeliveredEvent;
use App\Events\OrderShipped;
use App\Events\OrderRecieved;
use App\Listeners\CancelledShippmentListener;
use App\Listeners\ConfirmedOrderListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\OrdershippedListener;
use App\Listeners\OrderConfirmedListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
       OrderRecieved::class => [
            OrderConfirmedListener::class,
        ],
        OrderShipped::class => [
            OrdershippedListener::class,
        ],
        DeliveredEvent::class => [
            DeliveredShippmentListener::class,
        ],
       CancelledEvent::class => [
            CancelledShippmentListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ConfirmedOrderEvent::class => [
           ConfirmedOrderListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
