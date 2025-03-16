<x-app-layout>
    <x-slot:title>
        {{ __('Liste des prestataires') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            {{ __('Liste des prestataires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gradient-to-r from-green-50 to-blue-50 border-b border-gray-200">
                    <!-- Titre descriptif avec fond vert -->
                    <div class="mb-8 p-4 bg-green-500 rounded-lg shadow-md">
                        <h1 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ __('Gestion des prestataires') }}
                        </h1>
                        <p class="mt-2 text-sm text-green-100">
                            {{ __('Consultez, modifiez ou supprimez les prestataires de votre plateforme.') }}
                        </p>
                    </div>

                    <!-- Bouton pour ajouter un nouveau prestataire -->
                    <div class="mb-6">
                        <a href="{{ route('admin.providers.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring-2 focus:ring-green-200 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            {{ __('Ajouter un prestataire') }}
                        </a>
                    </div>

                    

                    <!-- Tableau des prestataires -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">{{ __('Nom complet') }}</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">{{ __('Téléphone') }}</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">{{ __('Région') }}</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700 uppercase tracking-wider">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $provider->nom_complet }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $provider->telephone }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $provider->region_actuelle }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('admin.providers.show', $provider->id) }}" class="text-green-600 hover:text-green-900 mr-2">{{ __('Voir') }}</a>
                                            <a href="{{ route('admin.providers.edit', $provider->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">{{ __('Modifier') }}</a>
                                            <form action="{{ route('admin.providers.destroy', $provider->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Supprimer') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $providers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>