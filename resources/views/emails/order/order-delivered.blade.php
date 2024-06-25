@component('mail::message')
# Introduction

Congratulations on your new candle friend! Remember to treat it well by knowing how to take care of it, here:
<a href="{{route('candle_care')}}">How to take care of your Candel!</a>
@component('mail::button', ['url' => 'http://joyfulegy.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
