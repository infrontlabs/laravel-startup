 @extends('layouts.account')



@section('content')

    @subscriptionontrial
        <div class="alert alert-warning">Your free trial ends {{$account->trialEndsAt()->toFormattedDateString()}}</div>
    @endsubscriptionontrial


    @component('components.card')
        @slot('title')
            Subscription Details
        @endslot

        <table class="table table-borderless mb-0">
        <tbody>
            <tr>
                <th scope="row" width="250">Plan</th>
                <td>{{$details['plan']->nickname}}</td>
            </tr>
            <tr>
                <th scope="row">Next bill date</th>
                <td>{{$details['nextBillDate']}}</td>
            </tr>
            <tr>
                <th scope="row">Plan price</th>
                <td>${{$details['plan']->amount/100}} per license/user</td>
            </tr>
            <tr>
                <th scope="row"># of Licenses/Users</th>
                <td>{{ $account->subscription_quantity }}</td>
            </tr>
            <tr>
                <th scope="row">Payment method</th>
                <td>{{$details['paymentMethod']}}</td>
            </tr>
        </tbody>
        </table>

    @endcomponent
@endsection
