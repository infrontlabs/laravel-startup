@extends('layouts.base')

@section('base.content')
    <div class="container">
        <div class="row">
            <div class="col-3">

            @include('partials.nav._account')

            </div>
            <div class="col-9">

                @include('partials.flash')

                @ongenerictrial
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    Your free trial will end {{$account->trial_ends_at->toFormattedDateString()}}
                </div>
                @endongenerictrial

                @generictrialhasended
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    Your free trial has ended. <a href="{{ route('plans.index') }}">Choose a plan</a>
                </div>
                @endgenerictrialhasended

                @yield('content')
            </div>
        </div>
    </div>
@endsection
