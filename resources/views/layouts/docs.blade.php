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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div>

        @include('partials.nav._docs-main')

        <main class="py-4">
            <div class="container">
    <div class="row">
        <div class="col-md-3">@include('partials.nav._docs-left')</div>
        <div class="col-md-9">
            @yield('base.content')
        </div>
    </div></div>


          </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    @yield('scripts')
</body>

</html>
