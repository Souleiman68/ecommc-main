<x-principale-layout>

    <x-slot:title>
        {{ __('Ebnete Cosmetique - Accueil') }}
    </x-slot:title>

    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-0">

        <section class="px-3 py-5 bg-transparent lg:py-10 mb-12">
            <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
                <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
                    <p class="text-4xl font-bold md:text-5xl text-pink-600">25% OFF</p>
                    <p class="text-4xl font-bold md:text-4xl">SUMMER SALE</p>
                    <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
                    <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
                </div>
                <div class="order-1 lg:order-2 overflow-hidden w-80 h-80 lg:w-[500px] lg:h-[500px] relative">
                    <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                        @foreach ($HeroSectionImages as $hsi)
                            <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px] flex-shrink-0" src="{{ asset('assets/images/articles/'.$hsi->image) }}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="flex justify-between mt-20 py-6">
            <h2 class="lg:text-3xl font-bold md:text-2xl sm:text-xl text-pink-600">Explorez notre sélection d'articles</h2>
            <a href="{{ route('articles') }}" class="md:text-2xl sm:text-xl lg:text-lg font-semibold text-gray-700 hover:text-pink-600">Voir tous les articles</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-2 gap-10 my-8">

            @foreach ($articles as $article)
                {{-- CARD --}}
            <div class="rounded overflow-hidden shadow-lg">
    
                <a href="#"></a>
                <div class="relative">
                    <a href="{{ route('show.article', $article) }}">
                        <img class="w-full h-80 object-cover" src="{{ asset('assets/images/articles/'.$article->image) }}" alt="{{ $article->titre }}">
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                        </div>
                    </a>
                    <a href="{{ route('articles.by.categorie', $article->categorie_id) }}">
                        <div class="absolute bottom-0 left-0 bg-pink-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-pink-600 transition duration-500 ease-in-out">
                            {{ $article->categorie->nom_categorie }}
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4">
                    <a href="{{ route('show.article', $article) }}" class="font-semibold text-lg inline-block hover:text-pink-600 transition duration-500 ease-in-out">{{ $article->titre }}</a>
                    <p class="text-gray-500 text-sm">{{ Str::limit($article->contenu, 40) }}</p>
                </div>

            </div>
            @endforeach

        </div>
    </div>
    



    <script>
        let currentIndex = 0;
        const images = document.querySelectorAll('#carousel img');
        const totalImages = images.length;
    
        function showNextImage() {
            currentIndex = (currentIndex + 1) % totalImages;
            document.getElementById('carousel').style.transform = `translateX(-${currentIndex * 100}%)`;
        }
    
        setInterval(showNextImage, 3000); // Change image every 3 seconds
    </script>

</x-principale-layout>

