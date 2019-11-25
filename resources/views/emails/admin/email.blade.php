@component('mail::message')
Hello admin,
There is a new mail for you.

Name: {{ $name }}
Email: {{ $email }}
message:
{{ $message }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
