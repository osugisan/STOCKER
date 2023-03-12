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
<body class="h-100 d-flex justify-content-center align-items-center">
    <div class="w-100">
        {{-- ロゴ画像 --}}
        <div class="d-flex justify-content-center">
            <a href="{{ route('box.index') }}"><img src="/images/logo.png" width="150px" height="75px" style="object-fit: cover"></a>    
        </div> 
        <div class="d-flex justify-content-center mt-3">
            @yield('content')
        </div>
    </div>
</body>
</html>
