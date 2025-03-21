<x-principale-layout>
    <x-slot:title>
        {{ $service->titre }}
    </x-slot:title>

    <!-- Section principale -->
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <!-- Détails du service -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="flex flex-wrap">
                <!-- Image du service -->
                <div class="w-full lg:w-1/2 p-6">
                    @if($service->image)
                        <img src="{{ asset('assets/images/services/' . $service->image) }}" 
                             alt="{{ $service->titre }}" 
                             class="w-full h-auto rounded-lg shadow-md" 
                             id="mainImage">
                    @else
                        <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                            <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Détails du service -->
                <div class="w-full lg:w-1/2 p-6">
                    <h2 class="text-3xl font-bold text-indigo-800 mb-4">
                        {{ $service->titre }}
                    </h2>

                    <!-- Prix -->
                    <div class="mb-6">
                        <span class="text-2xl font-bold text-indigo-800">
                            {{ number_format($service->prix, 0, ',', ' ') }} MRU
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-6">
                        {!! nl2br(e($service->description)) !!}
                    </p>

                    @if($service->localisation)
                        <div class="flex items-center text-gray-600 mb-6">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $service->localisation }}</span>
                        </div>
                    @endif
                        <!-- Informations du prestataire -->
                        @if($service->provider)
                            <div class="mt-8 p-6 bg-gray-50 rounded-lg">
                                <h3 class="text-xl font-semibold text-indigo-800 mb-4">
                                    Information du prestataire
                                </h3>
                                
                                <div class="space-y-4">
                                    <!-- Nom complet -->
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span class="text-gray-700">{{ $service->provider->nom_complet }}</span>
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        <span class="text-gray-700">{{ $service->provider->telephone_formate }}</span>
                                    </div>

                                    <!-- Catégories -->
                                    @if($service->provider->categories->count() > 0)
                                        <div class="flex items-start">
                                            <svg class="w-5 h-5 text-indigo-600 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($service->provider->categories as $category)
                                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm">
                                                        {{ $category->nom_categorie }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Bouton WhatsApp -->
                                @if($service->provider->whatsapp)
                                    <div class="mt-6">
                                        <a href="https://wa.me/{{ $service->provider->whatsapp }}?text=Bonjour, je suis intéressé par votre service '{{ $service->titre }}'"
                                        class="bg-green-600 flex gap-2 items-center justify-center text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 shadow-lg hover:shadow-xl w-full sm:w-auto"
                                        target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
                                            </svg>
                                            Contacter sur WhatsApp
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Section des services similaires -->
        @if($recentServices && $recentServices->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-indigo-800 mb-8 text-center">
                    Services similaires
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recentServices as $recentService)
                        <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden">
                            <div class="relative">
                                <a href="{{ route('service.show', $recentService->id) }}">
                                    @if($recentService->image)
                                        <img class="w-full h-64 object-cover transform hover:scale-105 transition duration-300"
                                             src="{{ asset('assets/images/services/' . $recentService->image) }}" 
                                             alt="{{ $recentService->titre }}" 
                                             loading="lazy">
                                    @else
                                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black opacity-10 hover:opacity-0 transition duration-300"></div>
                                </a>
                                <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ number_format($recentService->prix, 0, ',', ' ') }} MRU
                                </div>
                            </div>

                            <div class="p-6">
                                <a href="{{ route('service.show', $recentService->id) }}" 
                                   class="text-xl font-bold text-indigo-800 hover:text-indigo-600 transition duration-300">
                                    {{ $recentService->titre }}
                                </a>
                                <p class="text-gray-600 text-sm mt-2">
                                    {{ Str::limit($recentService->description, 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-principale-layout>