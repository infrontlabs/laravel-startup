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
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $account->owner->full_name }}</td>
                    <td>{{ $account->owner->email }}</td>
                    <td>Owner</td>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                @foreach($members as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ role($user->pivot->role) }}</td>
                    <td>
                        @if($canmanageteams && $user->pivot->role !== 'owner')

                        <form action="{{ route('account.team.delete', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>

                        @endif
                    </td>
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


        @if($account->invites->count())
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Invitation Sent</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($account->invites as $invite)
                <tr>
                    <td>{{ $invite->email }}</td>
                    <td>{{ role($invite->role) }}</td>
                    <td>{{ $invite->created_at->diffForHumans() }}</td>
                    <td><a href="{{ route('account.team.invite.resend', $invite) }}">Resend</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else

            <p>No invites</p>

        @endif


        <form action="{{ route('account.team.invite') }}" method="post">
            {{ csrf_field() }}

            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email address" value="{{ old('email') }}">
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="col">
                    <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                        <option value="">Select a role</option>
                        <option value="admin">Administrator</option>
                        <option value="dev">Developer</option>
                    </select>
                    <div class="text-danger">
                        {{ $errors->first('role') }}
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Send Invite</button>
                </div>
            </div>
        </form>
        @endemailconfirmed

    @endcomponent
@endsection
