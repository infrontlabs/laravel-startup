@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('title')
            Account Settings
        @endslot

        {{$account->name}}
    @endcomponent
@endsection
