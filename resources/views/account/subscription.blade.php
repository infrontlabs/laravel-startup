@extends('layouts.account')

@section('content')

    @component('components.card')
        @slot('title')
            Subscription
        @endslot

        <form action="{{ route('app.account.subscription') }}" method="post" id="payment-form">
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

            <button class="btn btn-secondary">Subscribe</button>

            <div id="card-errors" role="alert"></div>

        </form>

    @endcomponent

@endsection

@section('scripts')

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe("{{config('services.stripe.key')}}");

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', { style: style });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                document.getElementById('stripe_token').value = result.token.id;
                form.submit();
                console.log(result.token);
            }
        });
    });
</script>

@endsection
