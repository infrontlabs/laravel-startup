
    @component('components.card')
        @slot('title')
            Update Credit Card <span class="text-muted">Card on file ********{{$account->card_last_four}}</span>
        @endslot

        <form id="payment-form" action="{{ route('account.subscription.card.store') }}" method="post">
            <input type="hidden" name="stripe_token" id="stripe_token" />
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Card holder name</label>
                <input type="text" autocomplete='cc-name' name="billing_name" id="name" class="form-control{{ $errors->has('billing_name') ? ' is-invalid' : '' }}" placeholder="Jane Doe" value="{{ old('billing_name') }}" />
                <div class="text-danger">
                    {{ $errors->first('billing_name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="card-element">Card Number</label>
                <div id="card-element" class="form-group"></div>
            </div>
                <div class="text-danger">
                    {{ $errors->first('stripe_token') }}
                </div>

                <button type="submit" class="btn btn-dark">Update card</button>
            </form>
    @endcomponent

@section('scripts')

@include('partials.stripe._script')

@endsection
