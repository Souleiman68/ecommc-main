<x-principale-layout>
    <x-slot:title>
        {{ __('Catégories') }}
    </x-slot:title>

    <div class="py-12 sm:py-16 lg:py-20 bg-gray-50">
        <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Titre de la section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-indigo-800 sm:text-4xl lg:text-5xl">
                    Nos Catégories
                </h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Découvrez nos catégories de services pour trouver exactement ce dont vous avez besoin.
                </p>
            </div>

            <!-- Grille des catégories -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $categorie)
                    <a href="{{ route('services.byCategory', $categorie->id) }}" 
                       class="group relative flex h-64 items-end overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                        <!-- Image de la catégorie (par défaut) -->
                        <img src="{{ asset('assets/images/categories/category-' . $loop->iteration . '.jpg') }}" 
                             alt="{{ $categorie->nom_categorie }}" 
                             class="absolute inset-0 h-full w-full object-cover object-center transition duration-300 group-hover:scale-110"
                             loading="lazy">
                        
                        <!-- Overlay sombre -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-60"></div>

                        <!-- Contenu de la catégorie -->
                        <div class="relative p-6">
                            <h3 class="text-xl font-bold text-white mb-2">
                                {{ $categorie->nom_categorie }}
                            </h3>
                            <p class="text-sm text-gray-200">
                                {{ $categorie->services()->count() }} services disponibles
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-principale-layout>