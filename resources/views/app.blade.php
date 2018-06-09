<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div id="app"></div>
    <!-- Scripts -->
    <script>

        window.Laravel = {
            user: {!! auth()->user()->with('accounts')->first() !!},
            routes: {
                home: '{!! route('home') !!}',
                logout: '{!! route('logout') !!}',
            }
        };

    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
