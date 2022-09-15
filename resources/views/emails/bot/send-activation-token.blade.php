@component('mail::message')
## Dear {{$payload->first_name}},

Your trade bot activation token is: <strong>{{$payload->token}}</strong>.


Warm regards,<br>
{{ config('app.name') }}
@endcomponent
