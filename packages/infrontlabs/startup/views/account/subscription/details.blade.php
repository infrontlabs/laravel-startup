 @extends('layouts.account')



@section('content')

    @subscriptionontrial
        <div class="alert alert-warning">Your free trial ends {{$account->trialEndsAt()->toFormattedDateString()}}</div>
    @endsubscriptionontrial


    @component('components.card')
        @slot('title')
            Update your plan
        @endslot

        <form action="{{ route('account.subscription.swap.store') }}" method="post" id="payment-form">
                <input type="hidden" name="stripe_token" id="stripe_token" />
                {{ csrf_field() }}

                <div class="form-group">
                    <ul class="list-group">
                        @foreach($plans as $plan)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="plan" id="plan_{{$plan['stripe_id']}}" value="{{$plan['stripe_id']}}"
                                        @if($plan['stripe_id'] == $currentPlan)
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


                <button class="btn btn-dark">Update</button>


            </form>

    @endcomponent
@endsection
