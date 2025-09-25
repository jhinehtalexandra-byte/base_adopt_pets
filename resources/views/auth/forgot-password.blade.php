<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&display=swap' rel='stylesheet'>
    <title>{{ __('Forgot Password') }} - AdoptPets</title>
    <style>
        {!! file_get_contents(resource_path('css/forgot.css')) !!}
    </style>
</head>
<body>
    <header>
        <div class="contenedor">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="{{ __('Logo de AdoptPets') }}">
            </a>
            
        </div>
    </header>

    <div class="forgot-container">
        <div class="forgot-formulario">
            <h1>{{ __('¿Olvidaste tu contraseña?') }}</h1>
            
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Introduce tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}
            </div>

            {{-- Mensaje de estado usando la directiva @session de Laravel --}}
            @session('status')
                <div class="alert alert-success mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <label for="email" class="sr-only">{{ __('Correo') }}</label>
                    <input 
                        id="email" 
                        class="block mt-1 w-full @error('email') border-red-500 @enderror"
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="{{ __('correo') }}"
                        required 
                        autofocus 
                        autocomplete="username"
                    />
                    @error('email')
                        <span class="error text-sm text-red-600 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn-primary">
                        {{ __('Enviar Enlace de Recuperación') }}
                    </button>
                </div>
            </form>

            <div class="forgot-opciones mt-4">
                <div class="volver-login">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">
                        ← {{ __('Volver al inicio de sesión') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>