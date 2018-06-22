@extends('layouts.account')

@section('content')

    @component('components.card')
        @slot('title')
            Profile
        @endslot



        <form action="{{ route('account.profile.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name', auth()->user()->first_name) }}">
                <div class="invalid-feedback">
                    {{ $errors->first('first_name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name', auth()->user()->last_name) }}">
                <div class="invalid-feedback">
                    {{ $errors->first('last_name') }}
                </div>
            </div>

            <div class="form-group">


                <label for="email">Email</label>
                <div class="input-group mb-3">
                    <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', auth()->user()->email) }}">

                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">

                            @emailnotconfirmed
                                <i data-toggle="tooltip" data-placement="left" title="Email address has not been confirmed." class="fas fa-exclamation-triangle text-danger"></i>
                                &nbsp;Email unconfirmed. &nbsp; <a href="{{ route('account.email.resend') }}">Resend</a>
                            @endemailnotconfirmed

                            @emailconfirmed
                                <strong class="text-success"><i class="fa fa-check"></i>&nbsp;Email confirmed!</strong>
                            @endemailconfirmed


                        </span>
                    </div>
                </div>
                <div class="text-danger">
                    {{ $errors->first('email') }}
                </div>






            </div>



            <button type="submit" class="btn btn-dark">Update</button>
        </form>

    @endcomponent
@endsection
