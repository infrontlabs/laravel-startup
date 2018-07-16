@extends('startup::docs.layout')

@section('base.content')
<h1>Billing</h1>
<p>
    LaravelStartup currently only supports billing through Stripe. All applicable methods for managing
    subscriptions is done through LaravelCashier traits. However, because the app is centered around team
    accounts, the traits are applied to the `App\Startup\Account` model instead of the `App\User` model as is what is tycally documented.
    Users do not have subscriptions, accounts do.
</p>
@endsection
