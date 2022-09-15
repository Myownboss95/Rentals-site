@component('mail::message')
## Hello {{$user->first_name}},

We were unable verify your account, as the documents provided did not meet our criteria.


Provide documents that are issued by a governmental body, and should be clear and visible.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
