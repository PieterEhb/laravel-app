<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-image: url('/storage/app/public/images/rollup-base.jpg');
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app" class="bg-dark bg-opacity-25">
        @include('partials.header')
        <main class="py-4">
            @yield('content')
        </main>
        
            @include('partials.footer partial')

    </div>
</body>

</html>