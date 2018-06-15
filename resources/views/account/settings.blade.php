@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Account Settings
        @endslot

        <form action="{{ route('account.settings') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Account Name</label>
                <input type="text" class="form-control" name="account_name" value="{{$account->name}}">
            </div>

                <button class="btn btn-dark">Save</button>

        </form>


    @endcomponent
@endsection
