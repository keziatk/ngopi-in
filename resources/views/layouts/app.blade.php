<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ngopi.in ☕</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="font-[Poppins] antialiased bg-coffee-dark text-gray-100">
    <div class="min-h-screen flex flex-col">

        {{-- Navbar --}}
        @include('layouts.navigation')

        {{-- Header --}}
        @isset($header)
        <header class="bg-coffee-card border-b border-white/10">
            <div class="max-w-7xl mx-auto py-6 px-6">
                {{ $header }}
            </div>
        </header>
        @endisset

        {{-- Content --}}
        <main class="flex-1 max-w-7xl mx-auto w-full px-6 py-8">
            {{ $slot }}
        </main>

    </div>
</body>

</html>