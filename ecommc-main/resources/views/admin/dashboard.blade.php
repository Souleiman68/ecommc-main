<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between bg-white shadow-sm p-4">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Tableau de bord') }}
      </h2>
      <div class="flex items-center space-x-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
          Nouvelle Action
        </button>
        <img src="{{ asset('assets/images/logo/462569790_897345172506313_3391367163079043555_n.jpg') }}" class="h-10 w-10 rounded-full" alt="User Avatar">
      </div>
    </div>
  </x-slot>

  <div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
      
      <!-- Carte de Bienvenue -->
      <div class="bg-white shadow-lg rounded-lg p-8 transform transition-transform hover:scale-105">
        <div class="flex flex-col md:flex-row items-center justify-between">
          <div>
            <h3 class="text-2xl font-bold text-gray-900">Bienvenue, {{ Auth::user()->full_name }} !</h3>
            <p class="mt-2 text-gray-600">Vous êtes connecté en tant qu'administrateur.</p>
          </div>
          <div class="mt-4 md:mt-0">
            <img src="{{ asset('assets/images/logo/462569790_897345172506313_3391367163079043555_n.jpg') }}" class="h-16 w-16 rounded-full shadow-md" alt="User Avatar">
          </div>
        </div>
      </div>

      <!-- Statistiques -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" class="block transform transition-transform hover:scale-105">
          <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex items-center">
              <div class="p-3 bg-blue-500 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm text-blue-700 font-medium">Services</p>
                <p class="text-3xl font-bold text-blue-900">{{ $servicesCount }}</p>
              </div>
            </div>
          </div>
        </a>

        <!-- Nombre de prestataires -->
        <a href="{{ route('admin.providers.index') }}" class="block transform transition-transform hover:scale-105">
          <div class="bg-gradient-to-r from-green-100 to-green-200 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex items-center">
              <div class="p-3 bg-green-500 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm text-green-700 font-medium">Prestataires</p>
                <p class="text-3xl font-bold text-green-900">{{ $providersCount }}</p>
              </div>
            </div>
          </div>
        </a>

        <!-- Nombre de catégories -->
        <a href="{{ route('admin.categories.index') }}" class="block transform transition-transform hover:scale-105">
          <div class="bg-gradient-to-r from-purple-100 to-purple-200 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex items-center">
              <div class="p-3 bg-purple-500 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"/>
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm text-purple-700 font-medium">Catégories</p>
                <p class="text-3xl font-bold text-purple-900">{{ $categoriesCount }}</p>
              </div>
            </div>
          </div>
        </a>

        <!-- Nombre d'utilisateurs -->
        <a href="{{ route('admin.users.index') }}" class="block transform transition-transform hover:scale-105">
          <div class="bg-gradient-to-r from-yellow-100 to-yellow-200 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <div class="flex items-center">
              <div class="p-3 bg-yellow-500 rounded-full">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
              </div>
              <div class="ml-4">
                <p class="text-sm text-yellow-700 font-medium">Utilisateurs</p>
                <p class="text-3xl font-bold text-yellow-900">{{ $usersCount }}</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</x-app-layout>