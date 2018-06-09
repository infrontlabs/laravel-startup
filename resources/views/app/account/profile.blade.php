@extends('layouts.account')

@section('content')
    @component('components.card')
        @slot('title')
            Profile
        @endslot

        Me
    @endcomponent
@endsection
