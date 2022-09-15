@component('mail::message')
## Hello {{$user->first_name}},

Your withdrawal request of {{'$'.number_format($transaction->amount)}} was declined.


We were unable to send the amount to the selected withdrawal method.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
