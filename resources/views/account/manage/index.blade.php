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

                                @if($account->id === $a->id)
                                    <i class="fa fa-check" style="font-size: 1.5em; color: green;"></i>
                                @else
                                    <a href="{{ route('account.switch', $a) }}" class="btn btn-primary">Choose</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="form-group">
                    <label for="new_account">Create another account</label>
                    <input type="text" class="form-control" placeholder="Account name" name="new_account" id="new_account">
                </div>

                <button type="submit" class="btn btn-dark">Create</button>

        </form>

    @endcomponent
@endsection
