<x-principale-layout>
  <x-slot:title>
    {{ __('Ebnete Cosmetique - Accueil') }}
  </x-slot:title>

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-br from-pink-50 to-purple-50 py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center">
        <!-- Texte Hero -->
        <div class="text-center lg:text-left space-y-8">
          <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-pink-600 to-purple-600 bg-clip-text text-transparent">
            Découvrez l'Excellence
          </h1>
          <p class="text-xl text-gray-700 max-w-2xl">
            Des services professionnels à portée de main, connectez-vous avec les meilleurs artisans de votre région.
          </p>
          <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
            <a href="#services" class="bg-pink-600 hover:bg-pink-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
              Explorer les Services
            </a>
          </div>
        </div>

        <!-- Carrousel -->
        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-2 border-pink-100 transform hover:shadow-3xl transition-shadow duration-300">
          <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
            @foreach ($HeroSectionImages as $hsi)
              <div class="w-full flex-shrink-0 relative">
                <img class="w-full h-96 object-cover" src="{{ asset('assets/images/articles/' . $hsi->image) }}" alt="">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Premium Section -->
  <section id="services" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">
          Nos Services <span class="text-pink-600">Phares</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          Découvrez une sélection exclusive de services professionnels vérifiés.
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($services as $service)
          <div class="group relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-pink-50">
            <div class="aspect-w-16 aspect-h-10">
              <img class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300" 
                   src="{{ asset('storage/' . $service->image) }}" 
                   alt="{{ $service->titre }}">
            </div>
            
            <div class="p-6">
              <div class="flex items-center gap-2 mb-3">
                <span class="inline-block px-3 py-1 bg-pink-100 text-pink-600 rounded-full text-sm font-medium border border-pink-200">
                  {{ $service->categorie->nom_categorie }}
                </span>
              </div>
              
              <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service->titre }}</h3>
              
              <div class="flex items-center text-gray-600 mb-4">
                <svg class="w-5 h-5 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ $service->location }}</span>
              </div>

              <div class="flex justify-between items-center">
                <p class="text-2xl font-bold text-pink-600">
                  {{ number_format($service->prix, 0, ',', ' ') }} XOF
                </p>
                <a href="{{ $service->whatsapp_link }}" 
                   class="flex items-center bg-pink-600 hover:bg-pink-700 text-white px-5 py-2 rounded-lg transition-colors duration-300 shadow-md hover:shadow-lg"
                   target="_blank">
                  <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347" />
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
  <section class="py-20 bg-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid md:grid-cols-3 gap-8">
        <!-- Avantage 1 -->
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition-shadow border-2 border-pink-100">
          <div class="flex items-center justify-center w-12 h-12 bg-pink-500 rounded-full mx-auto">
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
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition-shadow border-2 border-pink-100">
          <div class="flex items-center justify-center w-12 h-12 bg-pink-500 rounded-full mx-auto">
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
        <div class="bg-white rounded-lg px-6 py-8 shadow-lg hover:shadow-xl transition-shadow border-2 border-pink-100">
          <div class="flex items-center justify-center w-12 h-12 bg-pink-500 rounded-full mx-auto">
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
    
    function nextSlide() {
      currentIndex = (currentIndex + 1) % total;
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
    
    let interval = setInterval(nextSlide, 5000);
    carousel.parentElement.addEventListener('mouseenter', () => clearInterval(interval));
    carousel.parentElement.addEventListener('mouseleave', () => {
      interval = setInterval(nextSlide, 5000);
    });
  </script>
</x-principale-layout>