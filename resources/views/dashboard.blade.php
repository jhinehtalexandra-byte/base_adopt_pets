<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/welcomedash.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="welcome">
        <x-welcome />
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