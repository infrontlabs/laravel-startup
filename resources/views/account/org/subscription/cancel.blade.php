@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Cancel Subscription
        @endslot

        <form action="{{ route('account.org.subscription.cancel.process') }}" method="post">
            @csrf


            <button type="submit" class="btn btn-danger">Cancel my subscription</button>
        </form>

    @endcomponent
@endsection
