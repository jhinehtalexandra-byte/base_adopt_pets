<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
  <title>Iniciar sesión - AdoptPets</title>
  <style>
    {!! file_get_contents(resource_path('css/login.css')) !!}
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

  <section class="login-container">
    <div class="login-formulario">
      <h1>AdoptPets</h1>
      <h2>¡Bienvenido!</h2>
      <p>Inicie sesión para empezar a adoptar,<br>si no tienes cuenta puedes registrarte</p>

      {{-- Mostrar errores de validación --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Mostrar mensaje de éxito --}}
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      {{-- Mostrar mensaje de error de sesión --}}
      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <input type="email" 
               name="email" 
               placeholder="Correo electrónico" 
               value="{{ old('email') }}" 
               required 
               autocomplete="email" 
               autofocus>
        @error('email')
          <span class="error">{{ $message }}</span>
        @enderror

        <input type="password" 
               name="password" 
               placeholder="Contraseña" 
               required 
               autocomplete="current-password">
        @error('password')
          <span class="error">{{ $message }}</span>
        @enderror

        <div class="recordar">
          <input type="checkbox" 
                 id="remember" 
                 name="remember" 
                 {{ old('remember') ? 'checked' : '' }}>
          <label for="remember">Recordar contraseña</label>
        </div>

        <button type="submit">Iniciar sesión</button>
      </form>

      <div class="login-opciones">
        @if (Route::has('password.request'))
          <p class="olvido-password">
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
          </p>
        @endif

        @if (Route::has('register'))
          <p class="registro-link">
            ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
          </p>
        @endif
      </div>
    </div>

    <div class="login-imagen">
      <img src="{{ asset('images/Perro_viento.png') }}" alt="Perro feliz">
    </div>
  </section>
</body>
</html>