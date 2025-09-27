<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Saludo personalizado -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                <div class="p-6 text-white">
                    <h3 class="text-2xl font-bold">{{ __('¡Bienvenido de vuelta, :name!', ['name' => Auth::user()->name]) }}</h3>
                    <p class="text-green-100 mt-2">{{ __('Encuentra tu compañero perfecto y cambia una vida para siempre') }}</p>
                </div>
            </div>

            <!-- Navegación principal del dashboard - CORREGIDA -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Adoptar - CORREGIDO -->
    <a href="{{ route('mascotas.create') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
        <div class="p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">{{ __('Adoptar') }}</h3>
            <p class="text-sm text-gray-600 mt-2">{{ __('Encuentra tu mascota ideal') }}</p>
        </div>
    </a>

    <!-- Refugios - CORREGIDO -->
    <a href="{{ route('refugios') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
        <div class="p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">{{ __('Refugios') }}</h3>
            <p class="text-sm text-gray-600 mt-2">{{ __('Explora refugios cercanos') }}</p>
        </div>
    </a>

    <!-- Mis Mascotas - TEMPORALMENTE REDIRECT A ADOPCIÓN -->
    <a href="{{ route('mis-mascotas') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
        <div class="p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">{{ __('Mis Mascotas') }}</h3>
            <p class="text-sm text-gray-600 mt-2">{{ __('Gestiona mascotas') }}</p>
        </div>
    </a>

    <!-- Reportes - CORREGIDO CORRECTAMENTE -->
<a href="{{ route('reportes') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
    <div class="p-6 text-center">
        <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-900">{{ __('Reportes') }}</h3>
        <p class="text-sm text-gray-600 mt-2">{{ __('Ver estadísticas') }}</p>
    </div>
</a>

    <!-- Mi Perfil - SIN CAMBIOS -->
    <a href="{{ route('profile.show') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
        <div class="p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">{{ __('Mi Perfil') }}</h3>
            <p class="text-sm text-gray-600 mt-2">{{ __('Edita tu información') }}</p>
        </div>
    </a>
</div>

            <!-- Contenido principal del dashboard -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background: linear-gradient(135deg, #137035, #1B9E4B); color: white; text-align: center; padding: 40px 20px; margin-top: 60px;">
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - {{ __('Todos los derechos reservados') }} | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>

    <div style="position:fixed; bottom:10px; right:10px; background:red; color:white; padding:10px;">
    Usuario ID: {{ Auth::id() }}
</div>
</body>
</html>