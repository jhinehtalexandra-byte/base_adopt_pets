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
    @livewireStyles

    <!-- CSS propio -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('extra-css')

</head>
<body class="{{$bodyClass ??'' }} font-sans antialiased">

<header>
    <div class="contenedor">
        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
        </a>

        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">☰</label>

        <nav>
            
            <a href="{{ route('refugios-admin.index') }}" class="nav-link">Refugios</a>
            <a href="{{ route('mascotas.index') }}" class="nav-link">Mascotas</a>
            <a href="{{ route('usuarios.index') }}" class="nav-link">Adoptantes</a>
            
            

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

<main>
    {{ $slot }}
</main>

<footer class="footer">
    <div class="contenedor">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Síguenos en nuestras redes sociales</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
                
            <div class="footer-section">
                <div class="contact-info">
                    <p><i class="fas fa-phone"></i> Teléfono: 239812910010</p>
                    <p><i class="fas fa-envelope"></i> Correo: adoptpets@example.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle 156 # 58-26 Bogotá-Colombia</p>
                </div>
            </div>
        </div>
            
        <div class="footer-bottom">
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </div>
</footer>

<!-- Modals y scripts de Livewire -->
@stack('modals')
@livewireScripts

</body>
</html>
