@component('mail::message')
# Introduction

Joyful You have a meesage from <strong>{{$data['name']}}</strong><br>
from this email : <strong>{{$data['email']}}</strong>
<p>The content of the message : <strong >{{$data['msg']}}</strong></p>

@component('mail::button', ['url' => 'http://joyfulegy.com/'])
Go To Joyfulegy
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
