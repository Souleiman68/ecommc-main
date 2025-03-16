<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        {{ __('Tableau de bord') }}
      </h2>
      <!-- Optionnel : Bouton d'action ou avatar -->
    </div>
  </x-slot>

  <div class="py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
      
      <!-- Carte de Bienvenue -->
      <div class="bg-white shadow-lg rounded-lg p-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
          <div>
            <h3 class="text-xl font-bold text-gray-900">Bienvenue, {{ Auth::user()->username }} !</h3>
            <p class="mt-2 text-gray-600">Vous êtes connecté en tant qu'administrateur.</p>
          </div>
          <div class="mt-4 md:mt-0">
            <img src="{{ asset('assets/images/logo/462569790_897345172506313_3391367163079043555_n.jpg') }}" class="h-16 w-16 rounded-full" alt="User Avatar">
          </div>
        </div>
      </div>

      <!-- Statistiques -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" class="block">
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
        <a href="{{ route('admin.providers.index') }}" class="block">
        <div class="bg-gradient-to-r from-purple-100 to-purple-200 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <div class="flex items-center">
            <div class="p-3 bg-purple-500 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm text-purple-700 font-medium">Prestataires</p>
              <p class="text-3xl font-bold text-purple-900">{{ $providersCount }}</p>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
  </div>
</x-app-layout>