<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

   @include('layouts.front.head')
   @yield('css')
</head>
<body>
    <div id="app">
        @include('layouts.front.header')
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.front.footer')
    </div>
    @include('layouts.front.script')
    @yield('script')
</body>
</html>
