<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #3AA5A9;
            color: #333;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ route('plans.index') }}">{{ __('Plans') }}</a>
            @auth
            <a href="{{ route('app.dashboard') }}">Dashboard →</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div class="content">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            <div class="title">
                <span style="color:#000;">Laravel</span><span style="color:#FFF;">StartUp</span>
            </div>
            <p>A Laravel based multi-tenent platform for your next SaaS.</p>

            <div class="row">
                <div class="col">
                    <a class="btn btn-lg btn-block btn-outline-secondary"
                        href="https://github.com/infrontlabs/infront-startup">
                        <i class="fab fa-github"></i>
                        Download</a>
                </div>
                <div class="col">
                    <a class="btn btn-lg btn-block btn-secondary" href="/account">Demo</a>
                </div>
            </div>


        </div>
    </div>
</body>

</html>
