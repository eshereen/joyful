@component('mail::message')
# Introduction

We're sorry to know that you cancelled your order. Did something go wrong? Tell us here:
<a href="http://joyfulegy.com/#contact">How to take care of your Candel!</a>

@component('mail::button', ['url' => 'http://joyfulegy.com/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
