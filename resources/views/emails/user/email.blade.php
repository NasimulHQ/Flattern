@component('mail::message')
Hello {{ $name }},

Thanks for contacting with us. We will get back to you soon.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
