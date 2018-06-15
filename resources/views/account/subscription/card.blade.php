@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Update Card
        @endslot

        <form id="payment-form" action="{{ route('account.subscription.card.store') }}" method="post">
            <input type="hidden" name="stripe_token" id="stripe_token" />
            {{ csrf_field() }}


                <div id="card-element" class="form-group"></div>

                <div class="text-danger">
                    {{ $errors->first('stripe_token') }}
                </div>

                <button type="submit" class="btn btn-dark">Update card</button>
            </form>

    @endcomponent
@endsection

@section('scripts')

@include('partials.stripe._script')

@endsection
