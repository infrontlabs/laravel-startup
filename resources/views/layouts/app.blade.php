@extends('layouts.base')

@section('base.content')
    <div class="container">
        @ongenerictrial
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    Your free trial will end {{$account->trial_ends_at->toFormattedDateString()}}
                </div>
                @endongenerictrial
        <div class="row">
            <div class="col-3">

            @include('partials.nav._app')

            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
