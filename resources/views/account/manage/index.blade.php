@extends('layouts.base')

@section('base.content')
<div class="container">

    <a href="{{ route('account.index') }}">Back</a>

    @component('components.card')
        @slot('title')
            Switch Accounts
        @endslot

                <div class="form-group">
                    <ul class="list-group">
                        @foreach($ownedAccounts as $a)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$a->name}} ({{$a->id}}) - Account owner {{$a->owner->full_name}}
                                @if($a->isSubscribed())
                                - Subscribed to {{plan($a->currentPlan())}}
                                @endif

                                @if($account->id === $a->id)
                                    <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                                @else
                                    <a href="{{ route('accounts.switch', $a) }}" class="btn btn-primary btn-sm">Choose</a>
                                @endif
                            </li>
                        @endforeach
                        @foreach($accounts as $a)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$a->name}} ({{$a->id}}) - Account owner {{$a->owner->full_name}}
                                @if($a->isSubscribed())
                                - Subscribed to {{plan($a->currentPlan())}}
                                @endif

                                @if($account->id === $a->id)
                                    <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                                @else
                                    <a href="{{ route('accounts.switch', $a) }}" class="btn btn-primary btn-sm">Choose</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>


    @endcomponent

    @component('components.card')
        @slot('title')
            Create another account
        @endslot
        <form action="{{ route('accounts') }}" method="post">
                {{ csrf_field() }}


                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Account name" name="account_name" id="oew_Account">
                    <div class="text-danger">
                        {{ $errors->first('account_name') }}
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Create</button>

        </form>
    @endcomponent

</div>
@endsection
