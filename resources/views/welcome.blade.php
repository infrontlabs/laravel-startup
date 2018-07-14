<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>LaravelStartup - A Laravel based multi-tenent platform for your next SaaS.</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            background: url(/img/backgrounds/josh-calabrese-112481-unsplash3.jpg) no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .full-height footer {
            color: #333;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            text-align: center;
            opacity: .5;
        }

        .full-height footer a {
            color: #5481DB;
            font-weight: 600;
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

        a {
            color: #5481DB;
        }
        .links>a {
            color: #5481DB;
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
    <div class="flex-center position-ref full-height" style="flex-direction: column;">

        <div class="content">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="title">
                <img src="/img/logo-dark.svg" alt="" width="500">
            </div>
            <p>A Laravel based multi-tenent platform for your next SaaS.</p>

            <div class="row mb-3">
                <div class="col">
                    <a class="btn btn-lg btn-block btn-outline-primary"
                    href="https://github.com/infrontlabs/laravel-startup">
                    <i class="fab fa-github"></i>
                    Download</a>
                </div>
                <div class="col">
                    <a class="btn btn-lg btn-block btn-primary" href="/docs">Documentation</a>
                </div>
            </div>

        </div>
        <footer>
            <p>Background Photo by
            <a href="https://unsplash.com/photos/Ca8r0PSWg9Q?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText" target="_blank">
                Josh Calabrese
            </a> on <a href="https://unsplash.com/search/photos/business?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText" target="_blank">Unsplash</a></p>
        </footer>
    </div>
</body>

</html>
