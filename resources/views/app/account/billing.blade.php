@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Billing
        @endslot

        Billing
    @endcomponent
@endsection
