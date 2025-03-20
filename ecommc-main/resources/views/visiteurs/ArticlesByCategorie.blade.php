<x-principale-layout>
    <x-slot:title>
        {{ __('Catégories - ') }} {{ $categorie->nom_categorie }}
    </x-slot:title>
    
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <!-- Titre de la catégorie -->
        <div class="border-b mb-8 flex justify-between text-sm">
            <div class="text-indigo-800 flex items-center pb-2 pr-2 border-b-2 border-indigo-800 uppercase">
                <a href="#" class="font-semibold inline-block">
                    {{ $categorie->nom_categorie }}
                </a>
            </div>
        </div>

        <!-- Grille des services de la catégorie -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-200">
                    <!-- Image du service -->
                    <div class="relative">
                        <a href="{{ route('show.service', $service) }}">
                            <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-300" 
                                 src="{{ asset('storage/' . $service->image) }}" 
                                 alt="{{ $service->titre }}" 
                                 loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black opacity-10 hover:opacity-0 transition duration-300"></div>
                        </a>
                    </div>

                    <!-- Détails du service -->
                    <div class="p-6">
                        <a href="{{ route('show.service', $service) }}" class="text-xl font-bold text-indigo-800 hover:text-indigo-600 transition duration-300">
                            {{ $service->titre }}
                        </a>
                        <p class="text-gray-600 text-sm mt-2">
                            {{ Str::limit($service->description, 60) }}
                        </p>

                        <!-- Localisation et prix -->
                        <div class="flex items-center text-gray-600 mt-4">
                            <svg class="w-5 h-5 mr-2 text-indigo-800" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $service->localisation }}</span>
                        </div>

                        <!-- Prix et bouton de contact -->
                        <div class="flex justify-between items-center mt-4">
                            <p class="text-2xl font-bold text-indigo-800">
                                {{ number_format($service->prix, 0, ',', ' ') }} XOF
                            </p>
                            <a href="https://wa.me/{{ $service->whatsapp_link }}" 
                               class="flex items-center bg-indigo-800 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg transition duration-300 shadow hover:shadow-lg"
                               target="_blank">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/>
                                </svg>
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-principale-layout>