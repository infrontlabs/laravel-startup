@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Organizations</div>

                <div class="card-body">
                    @foreach($orgs as $org)

                        <a href="{{ route('org', $org) }}">{{$org->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
