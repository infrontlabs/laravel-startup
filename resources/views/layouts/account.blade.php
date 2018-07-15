@extends('layouts.base')

@section('base.content')
    <div class="container">
        @if(session('welcome'))
                <div class="p-0 mb-3" role="alert">
                    <h4 class="m-0 p-0">{!! session('welcome') !!}</h4>
                </div>
                @endif
        <div class="row">
            <div class="col-3">

            @include('partials.nav._account')

            </div>
            <div class="col-9">

                @include('partials.flash')

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
