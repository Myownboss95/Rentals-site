@component('mail::message')
## Howdy {{$user->first_name}}

Your documents have been reviewed, and your account has been verified.

Login, access your dashboard where you can make deposits, subscribe to a trading plan and commence trading.


Warm regards,<br>
{{ config('app.name') }}
@endcomponent
