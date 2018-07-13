<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-startup">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/img/logo.svg" alt="" width="200">
            </a>
            @if($account && !link_is_active('app'))
                <a href="{{ route('app.dashboard') }}" class="badge badge-pill p-2" style="background-color: #6c757d; color: white;">Back to Dashboard</a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('plans.index') }}">{{ __('Plans') }}</a>
                    </li>
                    @endguest
                </ul>

                <ul class="navbar-nav ml-auto">

                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else
                    @if (!auth::user()->email_confirmed)
                    <li>
                        <a class="nav-link" href="{{ route('account.index') }}">
                            <i data-toggle="tooltip" data-placement="left" title="Email address has not been confirmed." class="fas fa-exclamation-triangle text-danger mr-2"></i>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                <span class="align-middle mr-1 ml-1"><i class="fa fa-user"></i></span>
                                <span>
                                {{ auth::user()->full_name }}
                                </span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('app.dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('account.index') }}">
                                {{ __('Account') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
