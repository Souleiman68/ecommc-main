<x-principale-layout>
    <x-slot:title>
        {{ __('Nos Services') }}
    </x-slot:title>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Grid des services -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($services as $service)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                        <div class="relative">
                            @if($service->image)
                                <img src="{{ asset('assets/images/services/' . $service->image) }}" 
                                     alt="{{ $service->titre }}"
                                     class="w-full h-48 object-cover rounded-t-xl">
                            @else
                                <div class="w-full h-48 bg-gray-200 rounded-t-xl flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ number_format($service->prix, 0, ',', ' ') }} MRU
                            </div>
                        </div>

                        <!-- Rest of the card content remains the same -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->titre }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $service->description }}</p>
                            
                            @if($service->localisation)
                                <div class="flex items-center text-gray-500 mb-4">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    <span>{{ $service->localisation }}</span>
                                </div>
                            @endif

                            <div class="flex justify-between items-center">
                                <a href="{{ route('service.show', $service->id) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                    <span>Voir détails</span>
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">Aucun service disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($services->hasPages())
                <div class="mt-8">
                    {{ $services->links() }}
                </div>
            @endif
        </div>
    </div>
</x-principale-layout>