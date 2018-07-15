@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Team Name
        @endslot

        <form action="{{ route('account.settings') }}" method="post">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="account_name" value="{{$account->name}}">
            </div>

                <button class="btn btn-dark">Save</button>

        </form>


    @endcomponent


    @component('components.card')
        @slot('title')
            Team Owner
        @endslot

        {{$account->owner->full_name}} &lt;{{$account->owner->email}}&gt;

    @endcomponent


@endsection
