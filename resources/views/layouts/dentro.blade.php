<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AdoptPets</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
        
        <!-- CSS -->
        <style>
    {!! file_get_contents(resource_path('css/welcome.css')) !!}
  </style>
        
        <!-- Font Awesome for social media icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
<body>
    <header>
        <div class="contenedor">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
            </a>
            <nav>
                <a href="{{ route('mascotas.index') }}" class="nav-link">Adoptar</a>
                <a href="{{ route('refugios') }}" class="nav-link">Refugios</a>

                <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
            </nav>
        </div>
    </header>
    <main>
        @yield('tablamascotas')
    </main>
</body> 
</html>