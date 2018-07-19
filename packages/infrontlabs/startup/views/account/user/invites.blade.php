@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Invites
        @endslot

        <p>You have been invited to the following accounts.</p>

        @if($invites->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Account</th>
                    <th>Invite Sent</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invites as $invite)
                <tr>
                    <td>{{ $invite->account->name }}</td>
                    <td>{{ $invite->created_at->diffForHumans() }}</td>
                    <td><a href="{{ route('account.user.invites.accept', $invite) }}" class="btn btn-primary">Accept</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else

            No invites

        @endif


    @endcomponent
@endsection
