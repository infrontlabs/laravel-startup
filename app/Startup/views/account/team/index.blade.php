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
                    <td>{{ role($user->pivot->role)['name'] }}</td>
                    <td>
                        @if($canmanageteams)


                            <button type="button" class="btn text-dark btn-sm btn-link" data-toggle="modal" data-target="#editModal">Edit</button>

                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edituserlabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('account.team.edit', $user) }}" method="POST">
                                        @csrf
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edituserlabel">Edit user role for {{ $user->email }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach (config('team.roles') as $k => $role)
                                            <div class="form-check mb-2">
                                            <input class="form-check-input" name="role" type="radio" value="{{$k}}" id="role_{{$k}}"
                                            @if($user->pivot->role == $k)
                                            checked
                                            @endif
                                            >
                                            <label class="form-check-label" for="defaultrole_{{$k}}Check1">
                                                {{ $role['name'] }}<br>
                                                <small>{{ $role['description'] }}</small>
                                            </label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            </div>


                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteuserlabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('account.team.delete', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteuserlabel">Delete user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                       <strong>{{ $user->email }}</strong> will no longer be able to access this account.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            </div>

                                <button type="button" class="btn text-danger btn-sm btn-link" data-toggle="modal" data-target="#deleteModal">Remove</button>

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
                    <td>{{ role($invite->role)['name'] }}</td>
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

            <div class="d-flex align-content-center align-items-center">
                <div class="flex-fill mr-2">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email address" value="{{ old('email') }}">
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="flex-fill mr-2">
                    <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                        <option value="">Select a role</option>
                        @foreach (config('team.roles') as $k => $role)
                            <option value="{{$k}}">{{ $role['name'] }}</option>
                        @endforeach
                    </select>

                    <div class="text-danger">
                        {{ $errors->first('role') }}
                    </div>
                </div>
                <div class="flex-fill mr-2">
                    <button type="submit" class="btn btn-primary">Send Invite</button>
                </div>
            </div>
        </form>
        @endemailconfirmed

    @endcomponent
@endsection
