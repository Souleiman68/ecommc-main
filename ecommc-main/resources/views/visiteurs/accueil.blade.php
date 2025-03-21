<x-principale-layout>
  <x-slot:title>
    {{ __('Ebnete Cosmetique - Accueil') }}
  </x-slot:title>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-br from-indigo-800 to-indigo-900 py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
        <!-- Texte Hero -->
        <div class="text-center lg:text-left space-y-8">
          <h1 class="text-5xl md:text-6xl font-bold text-white">
            Découvrez l'Excellence
          </h1>
          <p class="text-xl text-gray-100 max-w-2xl">
            Des services professionnels à portée de main, connectez-vous avec les meilleurs artisans de votre région.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
            <a href="#services" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
              Explorer les Services
            </a>
          </div>
        </div>

        <!-- Carrousel -->
        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-2 border-yellow-500 transform hover:shadow-xl transition duration-300">
          <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
            @foreach ($heroSectionImages as $image)
              <div class="w-full flex-shrink-0 relative">
                <img class="w-full h-96 object-cover" src="{{ $image }}" alt="Image Hero {{ $loop->iteration }}" loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-black opacity-40"></div>
              </div>
            @endforeach
          </div>
          <!-- Boutons de navigation -->
          <button id="prevButton" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full shadow-md hover:bg-opacity-75 transition-all">
            <svg class="w-6 h-6 text-indigo-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
          </button>
          <button id="nextButton" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full shadow-md hover:bg-opacity-75 transition-all">
            <svg class="w-6 h-6 text-indigo-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </section>

<!-- Section Catégories -->
<!-- Section Catégories -->
<section class="py-16 bg-gradient-to-br from-white to-indigo-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Découvrez Nos <span class="text-indigo-800">Catégories</span>
            </h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Explorez nos principales catégories de services pour trouver ce qui correspond à vos besoins.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $categorie)
                <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200">
                    <!-- Image Container -->
                    <div class="relative h-48 overflow-hidden">
                        @if($categorie->image)
                            <img src="{{ asset('assets/images/categories/' . $categorie->image) }}" 
                                 alt="{{ $categorie->nom_categorie }}" 
                                 class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center">
                                <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                        @endif
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-800 transition duration-300">
                            {{ $categorie->nom_categorie }}
                        </h3>
                        

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
</section>

  <!-- Services Section -->
<section id="services" class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">
                Nos Services <span class="text-indigo-800">Phares</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Découvrez une sélection exclusive de services professionnels vérifiés.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-indigo-200 transform hover:-translate-y-1">
                    <div class="relative h-64 overflow-hidden">
                        @if($service->image)
                            <img class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500" 
                                 src="{{ asset('assets/images/services/' . $service->image) }}" 
                                 alt="{{ $service->titre }}" 
                                 loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-50 to-gray-100 flex items-center justify-center">
                                <svg class="w-16 h-16 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        <!-- Prix Badge -->
                        <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            {{ number_format($service->prix, 0, ',', ' ') }} MRU
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-800 transition-colors">
                            {{ $service->titre }}
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">
                            {{ $service->description }}
                        </p>

                        <div class="flex items-center text-gray-600 mb-4">
                            <svg class="w-5 h-5 mr-2 text-indigo-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span>{{ $service->localisation }}</span>
                        </div>

                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <a href="{{ route('service.show', $service->id) }}" 
                               class="inline-flex items-center text-indigo-800 hover:text-indigo-900 font-medium">
                                <span>Voir détails</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            @if($service->provider && $service->provider->whatsapp)
                                <a href="https://wa.me/{{ $service->provider->whatsapp }}?text=Bonjour, je suis intéressé par votre service '{{ $service->titre }}'" 
                                   class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300 shadow hover:shadow-lg"
                                   target="_blank">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824z"/>
                                    </svg>
                                    Contact
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Voir plus de services -->
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" 
               class="inline-flex items-center px-8 py-3 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <span class="text-lg font-semibold">Voir tous les services</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

  <!-- Avantages Section -->
  <section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-3 gap-8">
        <!-- Avantage 1 -->
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-800 rounded-full mx-auto">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
          </div>
          <h3 class="mt-5 text-xl font-bold text-gray-900 text-center">
            Rapidité d'exécution
          </h3>
          <p class="mt-2 text-sm text-gray-500 text-center">
            Intervention rapide garantie dans les 24h.
          </p>
        </div>

        <!-- Avantage 2 -->
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-800 rounded-full mx-auto">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h3 class="mt-5 text-xl font-bold text-gray-900 text-center">
            Professionnels vérifiés
          </h3>
          <p class="mt-2 text-sm text-gray-500 text-center">
            Tous nos prestataires sont certifiés.
          </p>
        </div>

        <!-- Avantage 3 -->
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition duration-300 border border-gray-200">
          <div class="flex items-center justify-center w-12 h-12 bg-indigo-800 rounded-full mx-auto">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586"/>
            </svg>
          </div>
          <h3 class="mt-5 text-xl font-bold text-gray-900 text-center">
            Support 24/7
          </h3>
          <p class="mt-2 text-sm text-gray-500 text-center">
            Assistance permanente par WhatsApp.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Script Carrousel -->
  <script>
    let currentIndex = 0;
    const carousel = document.getElementById('carousel');
    const total = carousel.children.length;

    function showSlide(index) {
      if (index < 0) index = total - 1;
      if (index >= total) index = 0;
      currentIndex = index;
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    document.getElementById('prevButton').addEventListener('click', () => showSlide(currentIndex - 1));
    document.getElementById('nextButton').addEventListener('click', () => showSlide(currentIndex + 1));

    let interval = setInterval(() => showSlide(currentIndex + 1), 5000);
    carousel.parentElement.addEventListener('mouseenter', () => clearInterval(interval));
    carousel.parentElement.addEventListener('mouseleave', () => {
      interval = setInterval(() => showSlide(currentIndex + 1), 5000);
    });
  </script>
</x-principale-layout>