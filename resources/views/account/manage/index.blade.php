@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Switch Accounts
        @endslot

        <p>Multiple accounts allows you to manage unique teams and subscriptions.</p>

        <form action="{{ route('account.accounts') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <ul class="list-group">
                        @foreach($accounts as $a)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$a->name}}

                                {{$a->isSubscribed()}}

                                @if($account->id === $a->id)
                                    <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                                @else
                                    <a href="{{ route('account.switch', $a) }}" class="btn btn-primary">Choose</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

        </form>

    @endcomponent

    @component('components.card')
        @slot('title')
            Create another account
        @endslot
        <form action="{{ route('account.accounts') }}" method="post">
                {{ csrf_field() }}


                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Account name" name="account_name" id="new_account">
                    <div class="text-danger">
                        {{ $errors->first('account_name') }}
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Create</button>

        </form>
    @endcomponent


@endsection
