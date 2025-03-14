<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('admin.services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Ajouter un Service
                    </a>

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">Nom</th>
                                    <th class="px-6 py-3 bg-gray-50">Catégorie</th>
                                    <th class="px-6 py-3 bg-gray-50">Prix</th>
                                    <th class="px-6 py-3 bg-gray-50">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td class="px-6 py-4">{{ $service->titre }}</td>
                                    <td class="px-6 py-4 text-center">{{ $service->categorie->nom_categorie }}</td>
                                    <td class="px-6 py-4 text-center">{{ number_format($service->prix, 0, ',', ' ') }} XOF</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="#" class="text-blue-500 hover:text-blue-700">Éditer</a>
                                        <span class="mx-2">|</span>
                                        <form class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>