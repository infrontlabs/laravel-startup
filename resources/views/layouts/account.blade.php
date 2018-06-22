@extends('layouts.base')

@section('base.content')
    <div class="container">
        <div class="row">
            <div class="col-3">

            @include('partials.nav._account')

            </div>
            <div class="col-9">

                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {!! session('success') !!}

                    @if (session('emailChanged'))
                        <div><strong>{!! session('emailChanged') !!}</strong></div>
                    @endif
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {!! session('error') !!}
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
@endsection
