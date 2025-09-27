<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'AdoptPets' }}</title>

    <!-- Scripts de Jetstream (necesarios para dropdowns, logout, etc.) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire styles -->
    
    <!-- CSS propio -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcomedash.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    @stack('extra-css')

</head>
<body class="{{$bodyClass ??'' }} font-sans antialiased min-h-screen flex flex-col">

    <header>
        <div class="contenedor">
            <!-- Logo -->
            <a href="{{ route('welcome') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
            </a>

            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">☰</label>

            <nav>
                
                <!-- <a href="{{ route('refugios-admin.index') }}" class="nav-link">Refugios</a> -->
                <!-- <a href="{{ route('mascotas.index') }}" class="nav-link">Mascotas</a> -->
                <!-- <a href="{{ route('usuarios.index') }}" class="nav-link">Adoptantes</a> -->
                
                

                @if (Route::has('login'))
                    @auth
                        <!-- Menú desplegable de Jetstream -->
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Enlace al perfil -->
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <!-- Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="boton">Registrarse</a>
                            <a href="{{ route('login') }}" class="boton">Iniciar sesión</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer style="background: linear-gradient(135deg, #137035, #1B9E4B); color: white; text-align: center; padding: 40px 20px; margin-top: 60px;">
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - {{ __('Todos los derechos reservados') }}</p>
        </div>
    </footer>

    <!-- Modals y scripts de Livewire -->
    @stack('modals')
    @livewireScripts

</body>
</html>
