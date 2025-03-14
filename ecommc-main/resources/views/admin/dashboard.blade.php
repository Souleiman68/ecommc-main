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
        <!-- Catégories -->
        <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-blue-500 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm text-blue-700 font-medium">Catégories</p>
              <p class="text-3xl font-bold text-blue-900">{{ $categoriesCount }}</p>
            </div>
          </div>
        </div>

        <!-- Services -->
        <div class="bg-gradient-to-r from-green-100 to-green-200 p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-green-500 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm text-green-700 font-medium">Services</p>
              <p class="text-3xl font-bold text-green-900">{{ $servicesCount }}</p>
            </div>
          </div>
        </div>

        <!-- Utilisateurs inscrits -->
        <div class="bg-gradient-to-r from-yellow-100 to-yellow-200 p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-yellow-500 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14a4 4 0 10-8 0M12 14v7"/>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm text-yellow-700 font-medium">Utilisateurs</p>
              <p class="text-3xl font-bold text-yellow-900">{{ $usersCount }}</p>
            </div>
          </div>
        </div>

        <!-- Dernière connexion -->
        <div class="bg-gradient-to-r from-purple-100 to-purple-200 p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-purple-500 rounded-full">
              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm text-purple-700 font-medium">Dernière connexion</p>
              <p class="text-3xl font-bold text-purple-900">
                {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->diffForHumans() : 'N/A' }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
