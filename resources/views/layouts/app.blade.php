<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .content-mesh {
                background-color: #f8fafc;
                background-image: 
                    radial-gradient(at 0% 0%, hsla(253,16%,95%,1) 0, transparent 50%), 
                    radial-gradient(at 50% 0%, hsla(225,39%,90%,1) 0, transparent 50%), 
                    radial-gradient(at 100% 0%, hsla(339,49%,90%,1) 0, transparent 50%);
            }
        </style>
    </head>
    <body class="font-sans antialiased content-mesh min-h-screen">
        <div class="min-h-screen bg-transparent">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/50 backdrop-blur-md border-b border-white/20">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
