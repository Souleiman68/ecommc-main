<x-app-layout>
    <x-slot:title>
        {{ __('Gestion des catégories') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des catégories') }}
        </h2>
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
                                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                {{ __('Ajouter une catégorie') }}
                            </a>
                        </div>
                    </div>

                    <!-- Tableau des catégories -->
                    <div class="overflow-x-auto rounded-lg shadow">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-blue-100 text-blue-900 uppercase text-sm">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold border border-gray-200">{{ __('Nom') }}</th>
                                    <th class="px-6 py-4 text-left font-semibold border border-gray-200">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @forelse($categories as $categorie)
                                    <tr class="hover:bg-blue-50 transition">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $categorie->nom_categorie }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.categories.edit', $categorie->id) }}" 
                                                   class="p-2 text-blue-600 hover:text-blue-900 rounded-lg hover:bg-blue-100 transition"
                                                   title="{{ __('Modifier') }}">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            onclick="confirmDelete(this)"
                                                            class="p-2 text-red-600 hover:text-red-900 rounded-lg hover:bg-red-100 transition"
                                                            title="{{ __('Supprimer') }}">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
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

    <script>
        function confirmDelete(button) {
            if (confirm('{{ __('Voulez-vous vraiment supprimer cette catégorie ?') }}')) {
                button.closest('form').submit();
            }
        }
    </script>
</x-app-layout>