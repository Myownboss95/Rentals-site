@component('mail::message')
## Hello {{$user->first_name}},

We have received your verification data, and our team is working to verify your details. Please note that verification takes maximum of 24 hours.

Warm regards,<br>
{{ config('app.name') }}
@endcomponent
