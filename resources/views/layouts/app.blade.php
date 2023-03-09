<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/6fc1e898b5.js" crossorigin="anonymous"></script>

    {{-- ファビコン --}}
    <link rel="shortcut icon" href="{{ asset('/logo.ico') }}">

</head>
<body>
    <div>
        <x-header></x-header>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
