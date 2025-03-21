<x-principale-layout>
    <x-slot:title>
        {{ __('Catégories') }}
    </x-slot:title>

    <div class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-indigo-50 to-gray-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">
                    Nos <span class="text-indigo-800">Catégories</span>
                </h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Découvrez nos catégories de services pour trouver exactement ce dont vous avez besoin.
                </p>
            </div>

            <!-- Grille des catégories -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($categories as $categorie)
                    <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-200">
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden">
                            @if ($categorie->image)
                                <img src="{{ asset('assets/images/categories/' . $categorie->image) }}" 
                                     alt="{{ $categorie->nom_categorie }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-800 transition duration-300">
                                {{ $categorie->nom_categorie }}
                            </h3>
                            
                            <div class="flex items-center text-gray-600 mb-4">
                                <svg class="w-5 h-5 mr-2 text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <span>{{ $categorie->services->count() }} services disponibles</span>
                            </div>

                            <a href="{{ route('services.byCategory', $categorie->id) }}" 
                            class="inline-flex items-center w-full justify-center px-6 py-3 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <span>Découvrir les services</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-principale-layout>