<x-app-layout>
    <x-slot:title>
        {{ __('Gestion des catégories') }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des catégories') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-6 text-gray-900">
                    <!-- Titre descriptif avec bouton d'action -->
                    <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div>
                                <h1 class="text-2xl font-bold text-blue-900 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                    {{ __('Liste des catégories') }}
                                </h1>
                                <p class="mt-2 text-sm text-blue-700">
                                    {{ __('Gérez toutes les catégories disponibles sur la plateforme.') }}
                                </p>
                            </div>
                            <a href="{{ route('admin.categories.create') }}" 
                               class="mt-4 md:mt-0 flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                {{ __('Ajouter une catégorie') }}
                            </a>
                        </div>
                    </div>

                    <!-- Tableau des catégories avec actions -->
                    <div class="overflow-x-auto rounded-lg shadow">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-blue-100 text-blue-900 uppercase text-sm">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold border border-gray-200">{{ __('Image') }}</th>
                                    <th class="px-6 py-4 text-left font-semibold border border-gray-200">{{ __('Nom') }}</th>
                                    <th class="px-6 py-4 text-left font-semibold border border-gray-200">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($categories as $categorie)
                                    <tr class="hover:bg-blue-50 transition">
                                    <td class="px-6 py-4">
                                        @if ($categorie->image)
                                            <img src="{{ asset('assets/images/categories/' . $categorie->image) }}" 
                                                alt="Image de {{ $categorie->nom_categorie }}" 
                                                class="w-16 h-16 object-cover rounded-lg shadow-sm">
                                        @else
                                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $categorie->nom_categorie }}
                                        </td>
                                        <td class="px-6 py-4 space-x-2">
                                            <a href="{{ route('admin.categories.edit', $categorie) }}" 
                                            class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                {{ __('Éditer') }}
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $categorie) }}" 
                                                  method="POST" 
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" 
                                                        onclick="confirmDelete(this)"
                                                        class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    {{ __('Supprimer') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                            {{ __('Aucune catégorie trouvée') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator && $categories->hasPages())
                        <div class="mt-6">
                            {{ $categories->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Ajoutez ce script avant la fermeture de x-app-layout -->
    <script>
        function confirmDelete(button) {
            if (confirm("{{ __('Êtes-vous sûr de vouloir supprimer cette catégorie ?') }}")) {
                button.closest('form').submit();
            }
        }
    </script>
</x-app-layout>