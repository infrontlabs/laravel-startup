@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Team Members
        @endslot

        <table class="table table-borderless mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ role($user->pivot->role) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endcomponent

    @component('components.card')
        @slot('title')
            Invitations
        @endslot

        @emailnotconfirmed
            <i class="fa fa-exclamation-triangle"></i>   Inviting users to your account is disabled until you confirm your email address.
        @endemailnotconfirmed

        @emailconfirmed
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="invite_email" id="invite_email" placeholder="Email address">
            </div>
            <div class="col">
                <select name="role" id="role" class="form-control">
                    <option>Select a role</option>
                    <option value="admin">Administrator</option>
                    <option value="dev">Developer</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Send Invite</button>
            </div>
        </div>
        @endemailconfirmed

    @endcomponent
@endsection
