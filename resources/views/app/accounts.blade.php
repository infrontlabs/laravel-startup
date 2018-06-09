@extends('layouts.app')

@section('content')

@component('components.card')
        @slot('title')
            Accounts
        @endslot

        @foreach($accounts as $a)

            @if($a->name == optional($account)->name)
                {{$a->name}}
            @else
                <p><a href="{{ route('account', $a) }}">{{$a->name}}</a></p>
            @endif
        @endforeach
    @endcomponent
@endsection
