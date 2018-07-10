@extends('layouts.base')

@section('base.content')
    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {!! session('error') !!}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {!! session('success') !!}
        </div>
        @endif
    </div>
    @yield('content')
@endsection
