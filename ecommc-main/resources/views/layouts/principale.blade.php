<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Ebnete Cosmetique' }}</title>

        <link rel="icon" href="{{ asset('assets/images/logo/462569790_897345172506313_3391367163079043555_n.jpg') }}">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="{{ asset('build/assets/app.js') }}"></script>

    </head>
    <body class="font-sans antialiased bg-slate-50">

        @include('layouts.navbar')

        <div class="bg-white text-black/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                    <main class="mt-4">

                        {{ $slot }}

                    </main>

                </div>
            </div>
        </div>

        @include('components.footer')
    </body>
</html>
