@component('mail::message')
Please confirm your email address

@component('mail::button', ['url' => route('auth.email.confirmation', $token)])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
