@component('mail::message')
## Hello Admin,

You have received a bot activation request from <strong>{{$user->first_name}}({{$user->email}}).</strong> Login to your dashboard to generate the activation code.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
