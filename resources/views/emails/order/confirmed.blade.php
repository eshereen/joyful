@component('mail::message')
# Congratulations

Your order is confirmed and we are working hard to make you the best scented candle ever!
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
