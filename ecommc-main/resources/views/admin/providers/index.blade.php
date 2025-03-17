<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
      <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
        </path>
      </svg>
      {{ __('Liste des prestataires') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6 bg-gradient-to-r from-green-50 to-blue-50 border-b border-gray-200">
          <div class="mb-6 p-4 bg-green-600 rounded-lg shadow-md text-white">
            <h1 class="text-2xl font-bold flex items-center">
              <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                   xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"></path>
              </svg>
              {{ __('Gestion des prestataires') }}
            </h1>
            <p class="mt-2 text-sm">{{ __('Gérez vos prestataires efficacement.') }}</p>
          </div>

          <div class="mb-6 text-right">
            <a href="{{ route('admin.providers.create') }}"
               class="px-4 py-2 bg-green-600 text-white rounded-md shadow-md hover:bg-green-700 transition">
              + {{ __('Ajouter un prestataire') }}
            </a>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse border border-gray-300 shadow-md">
              <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
              <tr>
                <th class="px-6 py-3 border">{{ __('Nom complet') }}</th>
                <th class="px-6 py-3 border">{{ __('Téléphone') }}</th>
                <th class="px-6 py-3 border">{{ __('WhatsApp') }}</th>
                <th class="px-6 py-3 border">{{ __('Région') }}</th>
                <th class="px-6 py-3 border">{{ __('Catégories') }}</th> <!-- Nouvelle colonne -->
                <th class="px-6 py-3 border">{{ __('Actions') }}</th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              @foreach ($providers as $provider)
                <tr class="hover:bg-gray-100 transition">
                  <td class="px-6 py-4 border">{{ $provider->nom_complet }}</td>
                  <td class="px-6 py-4 border">{{ $provider->telephone }}</td>
                  <td class="px-6 py-4 border">{{ $provider->whatsapp }}</td>
                  <td class="px-6 py-4 border">{{ $provider->region_actuelle }}</td>
                  <td class="px-6 py-4 border">
                    <!-- Afficher les catégories associées au prestataire -->
                    @if ($provider->categories->isNotEmpty())
                      <div class="flex flex-wrap gap-1">
                        @foreach ($provider->categories as $categorie)
                          <span class="px-2 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                            {{ $categorie->nom_categorie }}
                          </span>
                        @endforeach
                      </div>
                    @else
                      <span class="text-gray-500">Aucune catégorie</span>
                    @endif
                  </td>
                  <td class="px-6 py-4 border text-center">
                    <div class="flex justify-center space-x-2">
                      <a href="{{ route('admin.providers.show_edit', $provider->id) }}" class="text-green-600 hover:text-green-800">
                        ✏️
                      </a>
                      <form action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete(this)" class="text-red-600 hover:text-red-800">
                          🗑️
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

          <div class="mt-6">
            {{ $providers->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function confirmDelete(button) {
      if (confirm('{{ __("Voulez-vous vraiment supprimer ce prestataire ?") }}')) {
        button.closest('form').submit();
      }
    }
  </script>
</x-app-layout>