<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset("favicon/favicon-96x96.png") }}">

        <title>{{ config('app.name', 'Laravel') }} - Panel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset("css/font-awesome.css") }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.breeze.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{ $javascript ?? "" }}
    </body>
</html>
