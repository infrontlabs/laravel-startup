@extends('layouts.base')

@section('base.content')

<div class="container">
      <div class="mx-auto w-75">

        @include('partials.flash')

    @component('components.card')
        @slot('title')
            Subscription
        @endslot

        <form action="{{ route('account.subscribe.process') }}" method="post" id="payment-form">
            <input type="hidden" name="stripe_token" id="stripe_token" />
            {{ csrf_field() }}

            <div class="form-group">
                <label for="card-element">Select a Plan</label>
                <ul class="list-group">
                    @foreach($paidPlans as $plan)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="plan" id="plan_{{$plan['stripe_id']}}" value="{{$plan['stripe_id']}}"
                                @if ($selectedPlan['slug'] === $plan['slug'])
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="plan_{{$plan['stripe_id']}}">&nbsp;{{$plan['name']}}</label>
                                &nbsp;
                            </div>
                            <span>{{$plan['price']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <p><strong>Payment method</strong></p>

            <div class="form-group">
                <label for="">Card holder name</label>
                <input type="text" name="billing_name" id="name" class="form-control{{ $errors->has('billing_name') ? ' is-invalid' : '' }}" placeholder="Jane Doe" value="{{ old('billing_name', auth()->user()->full_name) }}" />
                <div class="text-danger">
                    {{ $errors->first('billing_name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="card-element">Card Number</label>
                <div id="card-element"></div>
            </div>

            <button class="btn btn-dark">Subscribe</button>

            <div id="card-errors" role="alert"></div>

        </form>

    @endcomponent

      </div>
</div>

@endsection

@section('scripts')

@include('partials.stripe._script')

@endsection
