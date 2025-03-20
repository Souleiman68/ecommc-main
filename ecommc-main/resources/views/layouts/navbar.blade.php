<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo & Nav Links -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('accueil') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>

                <!-- Desktop Nav Links -->
                <div class="hidden sm:flex space-x-6">
                    <x-nav-link :href="route('accueil')" :active="request()->routeIs('accueil')">
                        {{ __('Tableau de bord') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('services')">
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.providers.index')" :active="request()->routeIs('prestataires')">
                        {{ __('Prestataires') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('categories')">
                        {{ __('Catégories') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Login Icon (Right) -->
            <div class="hidden sm:flex items-center">
                @auth
                    <!-- Menu utilisateur -->
                    <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->username }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Déconnexion -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Déconnexion') }}
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                    <!-- Lien de connexion -->
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 transition">
                        <!-- User Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9.953 9.953 0 0112 15c2.21 0 4.243.714 5.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM19.428 15.341A9.97 9.97 0 0021 12c0-5.523-4.477-10-10-10S1 6.477 1 12c0 2.107.652 4.057 1.758 5.656" />
                        </svg>
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <div class="flex sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 border-t border-gray-200">
            <x-responsive-nav-link :href="route('accueil')" :active="request()->routeIs('accueil')">
                {{ __('Tableau de bord') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.services.index')" :active="request()->routeIs('services')">
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.providers.index')" :active="request()->routeIs('prestataires')">
                {{ __('Prestataires') }}
            </x-responsive-nav-link>
            <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('categories')">
                {{ __('Catégories') }}
            </x-nav-link>

            <!-- Mobile Login Link -->
@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Déconnexion') }}
        </x-responsive-nav-link>
    </form>
@else
    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
        {{ __('Connexion') }}
    </x-responsive-nav-link>
@endauth
        </div>
    </div>
</nav>