<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', env('APP_NAME'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @livewireStyles
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('apple-touch-icon.png') }}" />
</head>

<body>

    {{-- Application Header --}}
    <x-partials.header />

    {{-- Application Content --}}
    @yield('content')

    {{-- Application Footer --}}
    <x-partials.footer />

    @livewireScripts

    <!-- DaisyUI Auth Modal -->
    <dialog id="auth-modal" class="modal">
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

    @if ($errors->has('email') || $errors->has('password'))
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('auth-modal');
                if (modal && typeof modal.showModal === 'function') {
                    modal.showModal();
                }
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('auth-modal');
            if (modal) {
                modal.addEventListener('show', () => {
                    document.body.style.overflow = 'hidden';
                });
                modal.addEventListener('close', () => {
                    document.body.style.overflow = '';
                });
            }
        });
    </script>
</body>

</html>
