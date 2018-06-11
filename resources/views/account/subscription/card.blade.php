@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Update Card
        @endslot

        Update card

    @endcomponent
@endsection
