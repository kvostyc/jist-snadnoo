<header class="bg-white/95 backdrop-blur-sm border-b border-orange-100 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route("home") }}" class="flex items-center space-x-2">
            <div
                class="w-10 h-10 bg-gradient-to-r from-orange-500 to-amber-500 rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">JIST</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">{{ __('general.restaurant_name') }}</h1>
        </a>
        <nav class="hidden md:flex items-center space-x-6">
            <a href="#menu" class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.menu') }}</a>
            <a href="#about" class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.about') }}</a>
            <a href="#contact"
                class="text-gray-600 hover:text-orange-500 transition-colors">{{ __('general.contact') }}</a>
            <!-- DaisyUI Modal Trigger -->
            <button onclick="document.getElementById('login-modal').showModal()"
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium 
                ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring 
                focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 
                [&_svg]:shrink-0 text-primary-foreground h-10 px-4 py-2 bg-orange-500 hover:bg-orange-600">
                {{ __('general.login') }}
            </button>
        </nav>
    </div>
    <!-- DaisyUI Modal -->
    <dialog id="login-modal" class="modal">
        <div class="modal-box max-w-md bg-gray-50">
            <form method="dialog">
                <button type="submit"
                    class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2
                 text-gray-950 hover:text-gray-50">✕</button>
            </form>
            <x-auth.login.login-form />
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</header>
