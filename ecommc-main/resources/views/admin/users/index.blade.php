<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 leading-tight">
            {{ __('Gestion des utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Liste des utilisateurs</h3>
                        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ajouter un utilisateur
                        </a>
                    </div>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-neutral-300 text-left text-sm leading-4 text-neutral-700 uppercase tracking-wider">Nom complet</th>
                                <th class="px-6 py-3 border-b-2 border-neutral-300 text-left text-sm leading-4 text-neutral-700 uppercase tracking-wider">Nom d'utilisateur</th>
                                <th class="px-6 py-3 border-b-2 border-neutral-300 text-left text-sm leading-4 text-neutral-700 uppercase tracking-wider">Date de création</th>
                                <th class="px-6 py-3 border-b-2 border-neutral-300 text-left text-sm leading-4 text-neutral-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-neutral-200">{{ $user->full_name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-neutral-200">{{ $user->username }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-neutral-200">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-neutral-200">
                                        @if ($user->id != 1)
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                            </form>
                                        @else
                                            <button type="button" class="text-gray-400 cursor-not-allowed" disabled>Supprimer</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>