@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('title')
            Billing
        @endslot

        Billing
    @endcomponent
@endsection
