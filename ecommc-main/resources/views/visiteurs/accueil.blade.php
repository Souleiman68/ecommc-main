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
            @foreach ($HeroSectionImages as $image)
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
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">
                Découvrez Nos <span class="text-indigo-800">Catégories</span>
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                Explorez nos principales catégories de services.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($categories as $categorie)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $categorie->nom_categorie }}</h3>
                        <p class="text-gray-600 mb-4">
                            Découvrez nos services dans cette catégorie.
                        </p>
                        <a href="{{ route('services.byCategory', $categorie->id) }}" 
                           class="inline-flex items-center px-6 py-3 bg-indigo-800 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                            Voir les services
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
  <section id="services" class="py-20 bg-white">
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
          <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-200">
            <div class="relative">
              <img class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-300" 
                   src="{{ asset('storage/' . $service->image) }}" 
                   alt="{{ $service->titre }}" 
                   loading="lazy">
            </div>
            
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->titre }}</h3>
              
              <div class="flex items-center text-gray-600 mb-4">
                <svg class="w-5 h-5 mr-2 text-indigo-800" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ $service->localisation }}</span>
              </div>

              <div class="flex justify-between items-center">
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