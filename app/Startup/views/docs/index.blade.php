@extends('layouts.docs')

@section('base.content')
<h1>Overview</h1>
<p>
    <strong>LaraveStartup</strong>, a Laravel based multi-tenent platform for building your next SaaS.
</p>
<p>
    This project was started because we (InFront Labs, LLC) realized that many of our clients were asking for the same
    thing - they have an app idea that they wanted us to build but they also wanted us to build into
    it, subscription based billing. Basically, something to manage the
    account and billing side of the app. Our clients want to focus on innovating on thier core idea and do
    not need us to innovate on the account and billing management on their behalf. Frankly, we just don't want to do
    that for every client either.
</p>
<p>
    There are some solutions out there but because we primarily do Laravel development, not many exist to support
    that architecture and those that do are much too opinionated that customization becomes
    a bit of a barrier to entry.
</p>
<p>
    Besides the benefit of not having to develop account and billing management from scratch, this is the value that
    <strong>LaravelStartup</strong> provides. There are no javascript libraries taking over the frontend to get in your way.
    It focuses on what is most important, which using Laravel, manages billing (with Stripe) and accounts and teams, leaving
    you to focus on what you do best.
</p>
<p>
    Here is a list of features it currently supports:
</p>
<ul class="list">
    <li>
        <strong>Multi-tenent:</strong>
        This is just a term that means it supports multiple accounts. Your customers sign up,
        create an account, choose a plan and subscribe to your service.
    </li>
    <li>
        <strong>Team membership:</strong>
        Your customers (account owners) can invite others to collaborate with them.
    </li>
    <li>
        <strong>Billing/Subscriptions through Stripe:</strong>
        Simply create an account on Stripe and LaravelStartup will handle the rest.
    </li>
    <li>
        <strong>Configurable plans:</strong>
        After you have created plans in stripe, they can be configured in the app.
    </li>
    <li>
        <strong>Mobile/API Authentication</strong>
        Want to build a native mobile app? LaravelStartup already manages the authentication for you.
    </li>
</ul>
@endsection
