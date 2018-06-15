@extends('layouts.account')

@section('content')

    @component('components.card')
        @slot('title')
            Subscription
        @endslot

        <form action="{{ route('account.org.subscribe.process') }}" method="post" id="payment-form">
            <input type="hidden" name="stripe_token" id="stripe_token" />
            {{ csrf_field() }}

            <div class="form-group">
                <ul class="list-group">
                    @foreach($plans as $plan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="plan" id="plan_{{$plan['stripe_id']}}" value="{{$plan['stripe_id']}}">
                                <label class="form-check-label" for="plan_{{$plan['stripe_id']}}">&nbsp;{{$plan['name']}}</label>
                                &nbsp;
                            </div>
                            <span>{{$plan['price']}} {{$plan['interval']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="form-group row">
                <label for="qty" class="col-sm-2 col-form-label">Seats</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="qty" id="qty" value="1" style="width: 3em; padding-right: 0;">
                </div>
            </div>

            <hr>
            <div id="card-element" class="form-group"></div>
            <hr>

            <button class="btn btn-dark">Subscribe</button>

            <div id="card-errors" role="alert"></div>

        </form>

    @endcomponent

@endsection

@section('scripts')

@include('partials.stripe._script')

@endsection
