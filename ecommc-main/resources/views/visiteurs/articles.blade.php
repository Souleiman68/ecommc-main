<x-principale-layout>

    <x-slot:title>
        {{ __('Ebnete Cosmetique - Tous nos produits') }}
    </x-slot:title>
    
    <div class="max-w-screen-xl mx-auto p-5 sm:p-0 md:p-0 lg:p-16 relative">

        <div class="border-b mb-8 flex justify-between text-sm">
            <div class="text-pink-500 flex items-center pb-2 pr-2 border-b-2 border-pink-600 uppercase">
                <p class="font-semibold inline-block">
                    {{ __('Nos Produits') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-2 gap-10 my-8">

            @foreach ($articles as $article)
                  {{-- CARD --}}
              <div class="rounded overflow-hidden shadow-lg">
  
                  <a href="#"></a>
                  <div class="relative">
                      <a href="{{ route('show.article', $article) }}">
                          <img class="w-full h-80 object-cover" src="{{ asset('assets/images/articles/'.$article->image) }}" alt="{{ $article->titre }}">
                          <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-10">
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

        <div class="mt-10">
            {{ $articles->links() }}
        </div>

    </div>



    
</x-principale-layout>
