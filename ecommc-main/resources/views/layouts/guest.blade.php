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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-blue-50 to-green-50">
    
    @include('layouts.navbar')

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
      <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white border border-blue-100 shadow-lg overflow-hidden sm:rounded-xl">
        <h2 class="text-blue-800 mb-9 text-center text-3xl font-bold">
          Connexion
        </h2>
        {{ $slot }}
      </div>
    </div>
  </body>
</html>
