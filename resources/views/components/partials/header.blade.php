<header class="bg-white/95 backdrop-blur-sm border-b border-orange-100 sticky top-0 z-50" x-data="{ mobileMenu: false }">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            <div
                class="w-10 h-10 bg-gradient-to-r from-orange-500 to-amber-500 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">JIST</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">{{ __('general.restaurant_name') }}</h1>
        </a>
        <!-- Desktop menu -->
        <nav class="hidden md:flex items-center space-x-6">
            <a href="#menu" class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.menu') }}</a>
            <a href="#about"
                class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.about') }}</a>
            <a href="#contact"
                class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.contact') }}</a>
            @auth
                <div class="flex justify-content-center items-center gap-2">
                    <div>
                        <a tabindex="0" role="button" href="{{ route("profile.edit") }}"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium
                            ring-offset-background transition-colors h-10 px-4 py-2 bg-gray-50 hover:bg-gray-200 text-orange-600">
                            {{ auth()->user()->name }}
                        </a>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium
                            ring-offset-background transition-colors h-10 px-4 py-2 bg-orange-500 hover:bg-orange-600">
                            {{ __('general.logout') }}
                        </button>
                    </form>
                </div>
            @else
                <button onclick="document.getElementById('auth-modal').showModal()"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium 
                    ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring 
                    focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 
                    [&_svg]:shrink-0 text-primary-foreground h-10 px-4 py-2 bg-orange-500 hover:bg-orange-600">
                    {{ __('general.login') }}
                </button>
            @endauth
        </nav>
        <!-- Hamburger button (mobile only) -->
        <button @click="mobileMenu = !mobileMenu" class="md:hidden flex items-center px-3 py-2 border rounded text-orange-600 border-orange-600">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <!-- Mobile menu -->
    <nav x-show="mobileMenu" x-transition class="md:hidden px-4 pb-4">
        <a href="#menu" class="block py-2 text-gray-600 hover:text-orange-500">{{ __('general.menu') }}</a>
        <a href="#about" class="block py-2 text-gray-600 hover:text-orange-500">{{ __('general.about') }}</a>
        <a href="#contact" class="block py-2 text-gray-600 hover:text-orange-500">{{ __('general.contact') }}</a>
        @auth
            <a href="{{ route('profile.edit') }}" class="block py-2 text-orange-600 font-semibold">{{ auth()->user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left py-2 text-orange-500 hover:text-orange-600">
                    {{ __('general.logout') }}
                </button>
            </form>
        @else
            <button onclick="document.getElementById('auth-modal').showModal()" class="block w-full text-left py-2 text-orange-500 hover:text-orange-600">
                {{ __('general.login') }}
            </button>
        @endauth
    </nav>
</header>
