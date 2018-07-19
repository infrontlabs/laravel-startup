@extends('layouts.account')

@section('content')

    @component('components.card')
        @slot('title')
            My Team Accounts
        @endslot

        <table class="table table-borderless">
            <tr>
                <th>Account Name</th>
                <th>Owner</th>
                <th>Subscription</th>
                <th>Active</th>
                <th>&nbsp;</th>
            </tr>
            @foreach($ownedAccounts as $a)
                <tr>
                    <td>{{$a->name}}</td>
                    <td>{{$a->owner->full_name}}</td>
                    <td>
                        @if($a->isSubscribed())
                            {{plan($a->currentPlan())}}
                        @endif

                        @if($a->onGenericTrial())
                            Free Trial until {{$a->trial_ends_at->toFormattedDateString()}}
                        @endif

                        @if($a->isNotOnGenericTrial() && $a->isNotSubscribed())
                            <span class="text-muted">None</span>
                        @endif

                        @if($a->isCancelled())
                            <span class="text-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if($account->id === $a->id)
                            <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                        @else
                            <a href="{{ route('accounts.switch', $a) }}" class="btn btn-primary btn-sm">Activate</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            @foreach($accounts as $a)
                <tr>
                    <td>{{$a->name}}</td>
                    <td>{{$a->owner->full_name}}</td>
                    <td>
                        @if($a->isSubscribed())
                            {{plan($a->currentPlan())}}
                        @endif

                        @if($a->onGenericTrial())
                            Free Trial
                        @endif

                        @if($a->isNotOnGenericTrial() && $a->isNotSubscribed())
                            <span class="text-muted">None</span>
                        @endif
                    </td>
                    <td>
                        @if($account->id === $a->id)
                            <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                        @else
                            <a href="{{ route('accounts.switch', $a) }}" class="btn btn-primary btn-sm">Activate</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    @endcomponent

    @component('components.card')
        @slot('title')
            Create another team account
        @endslot
        <form action="{{ route('accounts') }}" method="post">
                {{ csrf_field() }}

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="account_name" placeholder="Big Enterprises, Inc." aria-label="Account name" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit" id="button-addon2">Create team</button>
                        </div>

                </div>
                <div class="text-danger">
                        {{ $errors->first('account_name') }}
                    </div>

        </form>
    @endcomponent


@endsection
