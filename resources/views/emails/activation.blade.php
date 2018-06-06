@component('mail::message')
Please activate your account

@component('mail::button', ['url' => route('account.activation', $token)])
Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
