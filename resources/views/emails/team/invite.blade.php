@component('mail::message')
You have been invited to join an account at {{config('app.name')}}

@component('mail::button', ['url' => route('account.user.invites')])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
