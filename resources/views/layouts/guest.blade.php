<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HBMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">


        <div class="flex flex-col items-center mb-6">
            <img src="https://cdn-icons-png.flaticon.com/512/235/235889.png"
                 class="w-24 h-24 opacity-90 drop-shadow-lg">

            <h1 class="mt-3 text-3xl font-extrabold text-gray-800 tracking-wide">
                HBMS
            </h1>

            <p class="text-gray-600 mt-1 text-sm">
                Hotel Booking Management System
            </p>
        </div>


        <div class="w-full sm:max-w-md bg-white/90 backdrop-blur-sm shadow-lg rounded-2xl px-8 py-6 border border-gray-200">

            {{ $slot }}

        </div>


        <p class="mt-6 text-gray-600 text-xs text-center">
            © {{ date('Y') }} HBMS — All Rights Reserved.
        </p>

    </div>
</body>
</html>
