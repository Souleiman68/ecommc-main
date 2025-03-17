<x-app-layout>
    <x-slot:title>
        {{ __('Créer un prestataire') }}
    </x-slot:title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-violet-100 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            {{ __('Créer un prestataire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gradient-to-r from-green-50 to-blue-50 border-b border-gray-200">
                    <!-- Titre descriptif avec fond vert -->
                    <div class="mb-8 p-4 bg-green-500 rounded-lg shadow-md">
                        <h1 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{ __('Créer un nouveau prestataire') }}
                        </h1>
                        <p class="mt-2 text-sm text-green-100">
                            {{ __('Remplissez les champs ci-dessous pour ajouter un nouveau prestataire.') }}
                        </p>
                    </div>

                    <form action="{{ route('admin.providers.store') }}" method="POST">
                        @csrf
                        <!-- Formulaire de création -->

                        <!-- Nom complet -->
                        <div class="mb-6">
                            <label for="nom_complet" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ __('Nom complet') }}
                            </label>
                            <input type="text" name="nom_complet" id="nom_complet" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200" required>
                        </div>

                        <!-- Date de naissance -->
                        <div class="mb-6">
                            <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ __('Date de naissance') }}
                            </label>
                            <input type="date" name="date_naissance" id="date_naissance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200" required>
                        </div>

                        <!-- Lieu de naissance -->
                        <div class="mb-6">
                            <label for="lieu_naissance" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ __('Lieu de naissance') }}
                            </label>
                            <input type="text" name="lieu_naissance" id="lieu_naissance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200" required>
                        </div>

                        <!-- Région actuelle -->
                        <div class="mb-6">
                            <label for="region_actuelle" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                {{ __('Région actuelle') }}
                            </label>
                            <input type="text" name="region_actuelle" id="region_actuelle" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200" required>
                        </div>

                        <!-- Téléphone -->
                        <div class="mb-6">
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ __('Téléphone') }}
                            </label>
                            <input type="text" name="telephone" id="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200" required>
                        </div>

                        <!-- WhatsApp -->
                        <div class="mb-6">
                            <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ __('WhatsApp') }}
                            </label>
                            <input type="text" name="whatsapp" id="whatsapp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200">
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                {{ __('Description') }}
                            </label>
                            <textarea name="description" id="description" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200"></textarea>
                        </div>

                        <!-- Catégories -->
                        <div class="mb-6">
                            <label for="categories" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                                </svg>
                                {{ __('Catégories') }}
                            </label>
                            <div class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200">
                                @foreach ($categories as $categorie)
                                    <div class="flex items-center mb-2">
                                        <input type="checkbox" name="categories[]" id="categorie-{{ $categorie->id }}" value="{{ $categorie->id }}" class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                        <label for="categorie-{{ $categorie->id }}" class="ml-2 block text-sm text-gray-700">{{ $categorie->nom_categorie }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring-2 focus:ring-green-200 transition ease-in-out duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ __('Créer') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>