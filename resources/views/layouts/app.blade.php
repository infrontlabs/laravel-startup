@extends('layouts.base')

@section('base.content')
    <div class="container">
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
