<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Se connecter</title>
    <link rel="icon" href="{{ asset('assets/images/logo/462569790_897345172506313_3391367163079043555_n.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ asset('build/assets/app.js') }}"></script>
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-indigo-50 to-gray-50">
    <!-- Barre de navigation pour les utilisateurs non connectés -->
    @include('layouts.guest-navbar')

    <!-- Contenu principal -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white border border-indigo-100 shadow-2xl overflow-hidden sm:rounded-xl transform transition-all hover:shadow-3xl hover:scale-105">
            <!-- Titre -->
            <h2 class="text-indigo-800 mb-8 text-center text-3xl font-bold">
                Connexion
            </h2>

            <!-- Formulaire de connexion -->
            {{ $slot }}
        </div>
    </div>
</body>
</html>