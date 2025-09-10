<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contáctanos - AdoptPets</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
        
        <!-- CSS -->
       <style>
        {!! file_get_contents(resource_path('css/contactanos.css')) !!}
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
        <a href="{{ url('/') }}#adoptpets" class="nav-link">Inicio</a>
        <a href="#" class="nav-link">Adoptar</a>
        <a href="{{ route('refugios') }}" class="nav-link">Refugios</a>
        <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>
        <a href="{{ route('login') }}" class="boton">Iniciar sesión</a>
      </nav>
    </div>
  </header>

        <!-- Contact Section -->
        <section id="contactanos">
            <div class="contenedor">
                <div class="textocontacto">
                    <div class="texto">
                        <h2>Contáctanos</h2>
                        <p>Estamos aquí para ayudar y responder
                        cualquier pregunta que tengas, 
                        encontraremos la forma de responderla.
                        </p>

                        <p class="texto2">
                            Otras formas de contactarnos
                        </p>

                        <ul class="texto3">
                            <li>Telefono: 239812910010</li>
                            <li>Correo: adoptpets@example.com</li>
                            <li>Dirección: Calle 156 # 58-26 Bogotá-Colombia</li>
                        </ul>
                    </div>
                </div>
                
                <form class="formulario" action="#" method="POST">
                    @csrf
                    <div class="nombresfila">
                        <div class="campo">
                            <label for="nombres">Nombres:</label>
                            <input type="text" id="nombres" name="nombres" required>
                        </div>

                        <div class="campo">
                            <label for="apellido">Apellidos:</label>
                            <input type="text" id="apellido" name="apellidos" required>
                        </div>
                    </div>
                    
                    <div class="campo">
                        <label for="correo">Correo Electronico:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>

                    <div class="campo">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" required></textarea>
                    </div>

                    <div class="botonenviar">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
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