<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <strong>Laravel</strong><span>SaaS</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li>
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            <div class="container">
              <div class="row">
                <div class="col-3">
                  <aside>
                    <ul class="nav flex-column mb-4">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.dashboard') }}">
                          Home
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/link2">
                          Link 2
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/link3">
                          Link 3
                        </a>
                      </li>
                    </ul>
                  </aside>


                    <aside>
                    <h3 class="nav-heading">Account</h3>
                    <ul class="nav flex-column mb-4">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.account.settings') }}">
                          Settings
                        </a>
                        <a class="nav-link" href="{{ route('app.account.profile') }}">
                          Profile
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.account.billing') }}">
                          Billing
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.account.subscription') }}">
                          Subscription
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.account.invite') }}">
                          Invite
                        </a>
                      </li>
                    </ul>


                  </aside>

                </div>
                <div class="col-9">
                  @yield('content')
                </div>
              </div>
            </div>
          </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
