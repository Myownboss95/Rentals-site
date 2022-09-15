@component('mail::message')
## Dear {{$user->first_name}},


Your withdrawal request of {{'$'.number_format($transaction->amount)}} has been approved.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
