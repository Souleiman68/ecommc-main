<x-app-layout>
    <x-slot:title>
        {{ __('Modifier la catégorie') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                <form action="{{ route('admin.categories.update', $categorie->id) }}" 
                method="POST" 
                enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <!-- Champ Nom de la catégorie -->
                        <div class="mb-6">
                            <label for="nom_categorie" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('Nom de la catégorie') }}
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    name="nom_categorie"
                                    id="nom_categorie"
                                    value="{{ $categorie->nom_categorie }}"
                                    placeholder="{{ __('Entrez le nom de la catégorie') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    required
                                >
                                <!-- Icône optionnelle -->
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                         <!-- Dans le formulaire -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('Image de la catégorie') }}
                            </label>
                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                            >
                            @if ($categorie->image)
                                <div class="mt-4">
                                    <img src="{{ asset('assets/images/categories/' . $categorie->image) }}" 
                                        alt="Image de la catégorie" 
                                        class="w-32 h-32 object-cover rounded-lg">
                                </div>
                            @endif
                            <p class="mt-2 text-sm text-gray-500">
                                {{ __('Téléchargez une nouvelle image pour cette catégorie (optionnel).') }}
                            </p>
                        </div>

                        <!-- Bouton Mettre à jour -->
                        <div class="flex items-center justify-end mt-8">
                            <button
                                type="submit"
                                class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ __('Mettre à jour') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>