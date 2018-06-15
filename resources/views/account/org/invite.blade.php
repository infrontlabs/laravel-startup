@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Invite
        @endslot

        Invite team members to join your account.
    @endcomponent
@endsection
