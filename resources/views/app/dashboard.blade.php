@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('title')
            Get Started!
        @endslot

        {{$account->name}}
    @endcomponent
@endsection
