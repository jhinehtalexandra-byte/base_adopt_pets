<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&display=swap' rel='stylesheet'>
    <title>Recuperar contraseña - AdoptPets</title>
    <style>
        {!! file_get_contents(resource_path('css/forgot.css')) !!}
    </style>
</head>
<body>
    <header>
        <div class="contenedor">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
            </a>
            <nav>
                <a href="{{ url('/') }}#adoptpets" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Adoptar</a>
                <a href="{{ route('refugios') }}" class="nav-link">Refugios</a>
                <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
                <a href="{{ route('login') }}" class="boton">Iniciar sesión</a>
            </nav>
        </div>
    </header>

    <div class="forgot-container">
        <div class="forgot-formulario">
            <h1>Recuperar Contraseña</h1>
            
            
            <p>{{ __('Introduce tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña.') }}</p>

            {{-- Mensaje de estado (éxito) --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="Correo electrónico"
                        required 
                        autofocus 
                        autocomplete="username"
                    />
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">
                    {{ __('Enviar Enlace de Recuperación') }}
                </button>
            </form>

            <div class="forgot-opciones">
                <div class="volver-login">
                    <a href="{{ route('login') }}">← {{ __('Volver al inicio de sesión') }}</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>