<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
        
        <!-- CSS -->
        <style>
            {!! file_get_contents(resource_path('css/header.css')) !!}
            {!! file_get_contents(resource_path('css/footer.css')) !!}
            body{
                font-family: sans-serif;
            }
        </style>

        @yield('extra-css')
        
        <!-- Font Awesome for social media icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
<body class="@yield('body-class')">
    <header>
        <div class="contenedor">
            <!-- ✅ CORREGIDO: Ahora el logo es un enlace que va a welcome -->
            <a href="{{ route('welcome') }}" class="logo">
            <label for="" class="">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
            </a>

            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">☰</label>
            

            <nav>
                <a href="{{ route('welcome') }}" class="nav-link">Adoptar</a>
                <a href="{{ route('masco') }}" class="nav-link">Mascotas</a>
                <a href="{{ route('refugios') }}" class="nav-link">Refugios</a>
                <a href="{{ route('blogadopt') }}" class="nav-link">Blog</a>
                <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
                    
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>

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
        @yield('contenido')
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
</body> 
</html>