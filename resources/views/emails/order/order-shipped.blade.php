@component('mail::message')
Hi {{$event->order->shipping_name}},

 Your order has been shipped and is on its way to your home!<br>

Your order is:<br>
<strong>Item count: </strong>{{$event->order->item_count}} <br>
 <ul>
@foreach($event->order->products as $order)
<li>
    {{$order->name}} &
     Price: {{$order->price}} <small>LE</small>

</li>
@endforeach
</ul>
<strong>Shipping: {{$event->order->shipping_cost}} <small>LE</small> </strong><br>
<strong>Total price: </strong>{{$event->order->total_price}} <small>LE</small><br>
<strong>Shipment address:</strong>{{$event->order->shipping_address}}<br>
<strong>Shipment phone number:</strong>{{$event->order->shipping_phone}}<br>

Many Thanks <br>

@component('mail::button', ['url' => 'http://joyfulegy.com/'])
Back to Joyful
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
