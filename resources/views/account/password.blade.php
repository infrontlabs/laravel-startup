@extends('layouts.account')

@section('content')


    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    @component('components.card')
        @slot('title')
            Change password
        @endslot



        <form action="{{ route('account.password.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="password_current">Current Password</label>
                <input
                    type="password"
                    name="password_current"
                    id="password_current"
                    class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('password_current') }}
                </div>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <div class="form-group">
                    <label for="password_confirmation">New Password Again</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                </div>


            <button type="submit" class="btn btn-dark">Update</button>
        </form>

    @endcomponent
@endsection
