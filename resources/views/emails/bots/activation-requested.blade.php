@component('mail::message')
### Hello {{$user->first_name}}

We received a trade bot activation request from your account <strong>({{$user->email}})</strong>.

Our trade bot managment team will generate the token and send it to you via email.

Warm regards,<br>
{{ config('app.name') }}
@endcomponent
