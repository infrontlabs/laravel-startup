@extends('layouts.base')

@section('base_content')
    <div class="container">
        <div class="row">
            <div class="col-3">

            @include('partials.nav._account')

            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
