<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Paws & Preferences</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="antialiased font-sans">
    <div class="relative min-h-screen bg-pink-300 flex flex-col">
        @include('livewire.layout.navigation')
        <center class="m-auto flex flex-col gap-y-5">
            <h3 class="font-bold text-7xl sm:text-8xl text-white">Paws & Preferences</h3>

            <a class="rounded-3xl bg-gradient-to-r from-pink-500 via-orange-500 to-rose-500 text-white text-x font-bold px-8 py-2.5 max-w-fit mx-auto"
                href="{{ route('dashboard') }}">
                Find Your Favourite Kitty
            </a>
        </center>
    </div>

    @livewireScripts
</body>

</html>
