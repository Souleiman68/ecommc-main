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
                    <img src="{{ asset('storage/' . $service->image) }}" 
                         alt="{{ $service->titre }}" 
                         class="w-full h-auto rounded-lg shadow-md" 
                         id="mainImage">
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
                        {!! nl2br($service->description) !!}
                    </p>

                    <!-- Bouton de contact WhatsApp -->
                    <div class="mb-6">
                        <a href="https://wa.me/{{ $service->whatsapp_link }}?text=Bonjour,%20je%20souhaite%20commander%20le%20service%20'{{ $service->titre }}'."
                           class="bg-indigo-800 flex gap-2 items-center text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-lg hover:shadow-xl"
                           target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 32 32">
                                <path fill-rule="evenodd"
                                    d="M 24.503906 7.503906 C 22.246094 5.246094 19.246094 4 16.050781 4 C 9.464844 4 4.101563 9.359375 4.101563 15.945313 C 4.097656 18.050781 4.648438 20.105469 5.695313 21.917969 L 4 28.109375 L 10.335938 26.445313 C 12.078125 27.398438 14.046875 27.898438 16.046875 27.902344 L 16.050781 27.902344 C 22.636719 27.902344 27.996094 22.542969 28 15.953125 C 28 12.761719 26.757813 9.761719 24.503906 7.503906 Z M 16.050781 25.882813 L 16.046875 25.882813 C 14.265625 25.882813 12.515625 25.402344 10.992188 24.5 L 10.628906 24.285156 L 6.867188 25.269531 L 7.871094 21.605469 L 7.636719 21.230469 C 6.640625 19.648438 6.117188 17.820313 6.117188 15.945313 C 6.117188 10.472656 10.574219 6.019531 16.054688 6.019531 C 18.707031 6.019531 21.199219 7.054688 23.074219 8.929688 C 24.949219 10.808594 25.980469 13.300781 25.980469 15.953125 C 25.980469 21.429688 21.523438 25.882813 16.050781 25.882813 Z M 21.496094 18.445313 C 21.199219 18.296875 19.730469 17.574219 19.457031 17.476563 C 19.183594 17.375 18.984375 17.328125 18.785156 17.625 C 18.585938 17.925781 18.015625 18.597656 17.839844 18.796875 C 17.667969 18.992188 17.492188 19.019531 17.195313 18.871094 C 16.894531 18.722656 15.933594 18.40625 14.792969 17.386719 C 13.90625 16.597656 13.304688 15.617188 13.132813 15.320313 C 12.957031 15.019531 13.113281 14.859375 13.261719 14.710938 C 13.398438 14.578125 13.5625 14.363281 13.710938 14.1875 C 13.859375 14.015625 13.910156 13.890625 14.011719 13.691406 C 14.109375 13.492188 14.058594 13.316406 13.984375 13.167969 C 13.910156 13.019531 13.3125 11.546875 13.0625 10.949219 C 12.820313 10.367188 12.574219 10.449219 12.390625 10.4375 C 12.21875 10.429688 12.019531 10.429688 11.820313 10.429688 C 11.621094 10.429688 11.296875 10.503906 11.023438 10.804688 C 10.75 11.101563 9.980469 11.824219 9.980469 13.292969 C 9.980469 14.761719 11.050781 16.183594 11.199219 16.382813 C 11.347656 16.578125 13.304688 19.59375 16.300781 20.886719 C 17.011719 21.195313 17.566406 21.378906 18 21.515625 C 18.714844 21.742188 19.367188 21.710938 19.882813 21.636719 C 20.457031 21.550781 21.648438 20.914063 21.898438 20.214844 C 22.144531 19.519531 22.144531 18.921875 22.070313 18.796875 C 21.996094 18.671875 21.796875 18.597656 21.496094 18.445313 Z">
                                </path>
                            </svg>
                            Contactez-nous
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section des services recommandés -->
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold text-indigo-800 mb-8">
                Découvrez nos services
            </h2>

            <!-- Grille des services recommandés -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($services as $service)
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden">
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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-principale-layout>