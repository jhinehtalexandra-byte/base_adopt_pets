<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'AdoptPets' }}</title>
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    @vite(['resources/css/inicio_style.css', 'resources/js/app.js'])
    <style>
        /* CSS inline para la imagen de fondo */
        #adoptpets {
            background-image: url('{{ asset('images/perros.jpg') }}');
        }
    </style>
</head> 
<body>
    <header>
        <div class="contenedor">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="logo de la pagina">
            </a>
            <nav>
                <a href="#adoptpets" class="nav-link">Inicio</a>
                <a href="#" class="nav-link">Adoptar</a>
                <a href="#" class="nav-link">Refugios</a>
                <a href="#contactanos" class="nav-link">Contactanos</a>
                <a href="{{ route('login') }}" class="boton">Iniciar sesion</a>
            </nav>
        </div>
    </header>

    <section id="adoptpets">
        <div class="img-contenedor">
            <h1>{{ $pageTitle ?? 'AdoptPets' }}</h1>
            <p>{{ $pageSubtitle ?? 'Adopta a tu alma gemela' }}</p>
        </div>
    </section>

    <section id="contactanos">
        <div class="contenedor">
            <div class="textocontacto">
                <div class="texto"></div>
                <h2>Contactanos</h2>
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
                </ul>
            </div>

            <form class="formulario" method="POST" action="#">
                @csrf
                
                <div class="nombresfila">
                    <div class="campo">
                        <label for="nombres">Nombres:</label>
                        <input type="text" id="nombres" name="nombres" required>
                    </div>

                    <div class="campo">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" required>
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

    <section>
        <div class="error">
            <a href="#" class="nav-link">Ir al inicio</a>
        </div>
    </section>
</body>
</html>