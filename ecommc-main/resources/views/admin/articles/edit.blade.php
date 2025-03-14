<x-app-layout>

    <x-slot:title>
        {{ __('Modifier le produit') }}
        {{ $article->titre }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="titre" class="block text-sm font-medium text-gray-700">{{ __('Titre') }}</label>
                            <input type="text" name="titre" id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $article->titre }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="contenu" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea name="contenu" id="contenu" rows="15" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $article->contenu }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="prix" class="block text-sm font-medium text-gray-700">{{ __('Prix') }}</label>
                            <input type="text" name="prix" id="prix" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $article->prix }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="categorie_id" class="block text-sm font-medium text-gray-700">{{ __('Sélectionnez une catégorie') }}</label>
                            <select name="categorie_id" id="categorie_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">{{ __('Choisissez une catégorie') }}</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}" @selected($article->categorie_id == $categorie->id)>{{ $categorie->nom_categorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <img class="w-50 my-3" src="{{ asset('assets/images/articles/'.$article->image) }}" alt="{{ $article->titre }}">
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Mettre à jour') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
