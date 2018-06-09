@extends('layouts.app')

@section('content')

@component('components.card')
        @slot('title')
            Accounts ({{$account->name}})
        @endslot

        @foreach($accounts as $a)

            @if($a->name == $account->name)
                {{$a->name}}
            @else
                <a href="{{ route('account', $a) }}">{{$a->name}}</a>
            @endif
        @endforeach
    @endcomponent
@endsection
