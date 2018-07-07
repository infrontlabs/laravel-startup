@extends('layouts.base')

@section('base.content')
<div class="container">
      <div class="card-deck mb-3 text-center">


        @foreach($plans as $plan)
        <div class="card mb-4 box-shadow border-0">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $plan['name'] }}</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $plan['price'] }}</h1>
            <ul class="list-unstyled mt-3 mb-4">
                @foreach($plan['features'] as $feature)
                <li>{{ $feature }}</li>
                @endforeach
            </ul>
            <a href="{{ route('plans.subscribe', $plan['slug']) }}" class="btn btn-lg btn-block btn-primary">Get started</a>
          </div>
        </div>
        @endforeach


    </div>


</div> <!-- ./container -->
@endsection
