<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contáctanos - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Tu CSS de contactanos -->
    <style>
        {!! file_get_contents(resource_path('css/contactanos.css')) !!}
    </style>
    
    <!-- Styles adicionales para el header -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        body {
            background: #ffffff;
            font-family: 'Noto Sans', sans-serif;
            min-height: 100vh;
        }

        /* Header Styles */
        .public-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo img {
            height: 60px;
            width: auto;
        }

        .header-nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-link {
            color: #137035;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .nav-link:hover, .nav-link.active {
            color: #22C55E;
            background-color: rgba(34, 197, 94, 0.1);
        }

        .boton {
            background: linear-gradient(135deg, #22C55E, #1B9E4B);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .boton:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
        }

        /* Ajustar el contenido para el header fijo */
        #contactanos {
            margin-top: 80px;
        }

        /* Estilos para el botón del formulario */
        .botonenviar button {
            background: linear-gradient(135deg, #22C55E, #1B9E4B);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .botonenviar button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }

        /* Footer */
        .public-footer {
            background: linear-gradient(135deg, #137035, #1B9E4B);
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
        }

        /* Responsive para el header */
        @media (max-width: 768px) {
            .header-nav {
                flex-direction: column;
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: white;
                justify-content: flex-start;
                padding-top: 50px;
                transition: left 0.3s ease;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .nav-link, .boton {
                margin: 10px 0;
                width: 200px;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="public-header">
        <div class="header-container">
            <a href="{{ route('welcome') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="AdoptPets Logo">
            </a>

            <nav class="header-nav">
                <a href="{{ route('quienes-somos') }}" class="nav-link">Quiénes Somos</a>
                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                <a href="{{ route('contactanos') }}" class="nav-link active">Contáctanos</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="boton">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="boton">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Contact Section -->
    <section id="contactanos" class="py-10">
        <div class="contenedor">
            <div class="textocontacto">
                <div class="texto">
                    <h2>Contáctanos</h2>
                    <p>
                        Estamos aquí para ayudar y responder cualquier pregunta que tengas.  
                        Encontraremos la forma de responderla.
                    </p>

                    <p class="texto2">
                        Otras formas de contactarnos:
                    </p>

                    <ul class="texto3">
                        <li><strong>Teléfono:</strong> 239812910010</li>
                        <li><strong>Correo:</strong> adoptpets@example.com</li>
                        <li><strong>Dirección:</strong> Calle 156 # 58-26 Bogotá-Colombia</li>
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
                    <label for="correo">Correo Electrónico:</label>
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
    <footer class="public-footer">
        <div class="header-container">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>