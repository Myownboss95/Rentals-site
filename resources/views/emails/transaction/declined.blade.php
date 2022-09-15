@component('mail::message')
## Hello {{$user->first_name}},

Your deposit of {{'$'.number_format($transaction->amount)}}, has been declined. We were unable verify the proof of payment.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
