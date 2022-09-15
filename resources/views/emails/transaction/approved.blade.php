@component('mail::message')
## Hello {{$user->first_name}},

Your deposit of {{'$'.number_format($transaction->amount)}}, has been confirmed and your main balance has been updated.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
