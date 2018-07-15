@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Resume Subscription
        @endslot

        <form action="{{ route('account.subscription.resume.process') }}" method="post">
            @csrf


            <button type="submit" class="btn btn-primary">Resume my subscription</button>
        </form>

    @endcomponent
@endsection
