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
        <!-- Header -->
        <header>
            <div class="contenedor">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
                </a>
                <nav>
                    <a href="#" class="nav-link">Adoptar</a>
                    <a href="{{ route('refugios') }}" class="nav-link">Refugios</a>

                    <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>

                        @else
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Registro</a>
                                <a href="{{ route('login') }}" class="boton">Iniciar sesión</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section id="adoptpets">
            <div class="img-contenedor">
                <h1>AdoptPets</h1>
                <p>Adopta a tu alma gemela</p>
            </div>
        </section>
        
        <!-- News Section -->
        <section id="noticias">
            <div class="contenedor">
                <div class="rectangle">
                    <div class="text-wrapper">Noticias</div>
                </div>
                
                <div class="noticias-container">
                    <div class="stacked">
                        <img class="captura-de-pantalla" src="{{ asset('images/Noticia1.png') }}" alt="Noticia sobre esterilización" />
                        <h3 class="text-wrapper-5">Anuncian más de 6.000 turnos de esterilización gratuita en Bogotá</h3>
                        <p class="p">
                            Desde el próximo 10 de junio, y con el objetivo de prevenir el abandono y mejorar la salud de los animales
                            en Bogotá, el Instituto Distrital de Protección y Bienestar Animal (IDPYBA) habilitará más de 6.000 turnos
                            de esterilización en el punto fijo de la Universidad Nacional de Colombia.
                        </p>
                        <div class="text-wrapper-2">
                                https://www.elespectador.com/la-red-zoocial/anuncian-mas-de-6000-turnos-de-esterilizacion-gratuita-en-bogota/
                            </div>
                                                                         
                    </div>

                    <div class="stacked-2">
                        <img class="captura-de-pantalla-2" src="{{ asset('images/Noticia2.png') }}" alt="Razones para adoptar mascota" />
                        <h3 class="text-wrapper-6">¿Por qué adoptar una mascota? 7 razones para considerarlo</h3>
                        <p class="element-salvas-una-vida">
                            1. Salvas una vida. <br />
                            2. Te hacen compañía.<br />
                            3. No apoyarás a tiendas que las venden. <br />
                            4. Te mantienen activo.<br />
                            5. Le das oportunidad a otros. <br />
                            6. Te ayudan a distraerte.<br />
                            7. Te brindan amor incondicional.
                        </p>
                        <div class="text-wrapper-7">
                            https://elcomercio.pe/wuf/consultorio/adoptar-mascota-7-razones-considerarlo-252458-noticia/?ref=ecr
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <footer>
    <div class="contenedor">
      <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
    </div>
  </footer>

        <!-- Error link section -->
        <section>
            <div class="error">
                <a href="/error404" class="nav-link">Error de pagina</a>
            </div>
        </section>

        <!-- Footer -->
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
                            <p><i class="fas fa-envelope"></i> Correo: adopttpetts@example.com</p>
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