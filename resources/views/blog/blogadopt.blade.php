<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- CSS del blog original -->
    <style>
        {!! file_get_contents(resource_path('css/blog.css')) !!}
        
        /* Styles adicionales para header público */
        body {
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 0;
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

        nav {
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

        /* Ajustar contenido para header fijo */
        .container {
            margin-top: 100px;
        }

        /* Footer */
        .public-footer {
            background: linear-gradient(135deg, #137035, #1B9E4B);
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
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

            <nav>
                <a href="{{ route('quienes-somos') }}" class="nav-link">Quiénes Somos</a>
                <a href="{{ route('blog') }}" class="nav-link active">Blog</a>
                <a href="{{ route('contactanos') }}" class="nav-link">Contáctanos</a>

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

    <!-- Contenido del blog original -->
    <div class="container">
        <h1>10 señales de que tu mascota está estresada<br> (y como ayudarla)</h1>

        <div class="meta">
            <span>Categoría:</span> Salud Animal | <span>Tiempo de lectura:</span> 4 min
        </div>

        <div class="contenido">
            <div class="parrafos">
                <p>
                    El bienestar de tu mascota es esencial, y uno de los aspectos clave de su salud es saber identificar 
                    cuando está experimentando estrés. Al igual que los humanos, los animales también sienten estrés, 
                    y sus comportamientos pueden ser diferentes a los nuestros.
                </p>
                <p>
                    Conocer las señales de estrés en tu mascota te permitirá tomar medidas para mejorar su calidad 
                    de vida y bienestar emocional.
                </p>
                <p>
                    Aquí te dejamos 10 señales que te ayudarán a saber si tu mascota está estresada.
                </p>
            </div>

            <img class="gatoenojado" src="{{ asset('images/Rectangle 233.png') }}" alt="Mascota estresada">
            <div class="listascontenedor">
                <h2>1. Cambios en su alimentación</h2>
                <p>Pérdida de apetito o aumento excesivo de la comida pueden indicar estrés.</p>

                <h2>2. Vocalización excesiva</h2>
                <p>Vocalizaciones frecuentes sin motivo aparente pueden ser señal de ansiedad.</p>

                <h2>3. Conductas destructivas</h2>
                <p>Masticar, rascar o autolesionarse pueden reflejar estrés acumulado.</p>
            </div>
            

            <img class="perrotriste" src="{{ asset('images/Rectangle 234.png') }}" alt="Mascota estresada">
            <div class="listascontenedor">
                <h2>4. Alteraciones en su sociabilidad</h2>
                <p>Aislamiento repentino o exceso de apego pueden ser síntomas de estrés.</p>

                <h2>5. Lenguaje corporal tenso</h2>
                <p>Cola entre las patas, orejas hacia atrás o rigidez muestran incomodidad.</p>

                <h2>6. Jadeo o respiración alterada</h2>
                <p>Respiración acelerada sin causa física puede indicar ansiedad.</p>

                <h2>7. Lamido compulsivo</h2>
                <p>Lamido compulsivo (especialmente en patas o abdomen) puede ser un mecanismo de calma por estrés.</p>
                
                <div class="recuadro">
                    <h3>Soluciones practicas</h3>

                    <h4>Para estres leve</h4>

                    <li>Rutina de ejercicio: 30 min de paseo + juegos mentales (ej: kong con snacks).</li>
                    <li>Zona segura: Cama en lugar tranquilo + tu camiseta usada (tu olor lo calma).</li>

                    <h4>Para casos graves</h4>

                    <li>Consulta al veterinario: Podría necesitar feromonas o terapia.</li>
                    <li>Adaptil Diffuser: Feromonas sintéticas (recomendado por la Asociación Veterinaria Colombiana)</li>
                </div>

                <p>El estrés en las mascotas puede afectar seriamente su bienestar físico y emocional, pero como dueño responsable, puedes identificar las señales a tiempo para ayudarles a mejorar.
                    <br>Si notas varios de estos síntomas en tu mascota, es recomendable consultar con un veterinario o un especialista en comportamiento animal para desarrollar un plan que ayude a reducir su estrés.
                </p>
                <a href "https://vsd.mx/descubre-las-10-senales-que-indican-que-tu-mascota-tiene-estres">https://vsd.mx/descubre-las-10-senales-que-indican-que-tu-mascota-tiene-estres</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Guía para una adopción responsable</h1>

        <div class="meta">
            <span>Categoría:</span> Salud Animal | <span>Tiempo de lectura:</span> 4 min
        </div>

        <div class="contenido">

             <img class="gatoenojado" src="{{ asset('images/Rectangle 235.png') }}" alt="Mascota estresada">
            
            <div class="listascontenedor">
                <h3>1. Reflexiona antes de actuar</h3>
                <p>
                    <ul>¿Tienes el tiempo, dinero y espacio necesarios?</ul>
                    <ul>¿Estás listo para un compromiso de 10-20 años?</ul>
                    <ul>¿Todos en casa están de acuerdo?</ul>
                </p>

                <h3>2. Evalúa tu estilo de vida</h3>
                <p>
                    <ul>¿Trabajas todo el día fuera de casa?</ul>
                    <ul>¿Tienes niños o más mascotas?</ul>
                    <ul>¿Prefieres un animal tranquilo o activo?</ul>
                </p>

                <h3>3. Investiga dónde adoptar</h3>
                <p>
                    <ul>Refugios locales o fundaciones de protección animal.</ul>
                    <ul>Jornadas de adopción.</ul>
                    <ul>Redes sociales de rescatistas confiables.</ul>
                    <ul>Evita criaderos ilegales o ventas por internet sin respaldo.</ul>
                </p>

            <img class="gatoenojado" src="{{ asset('images/Rectangle 236.png') }}" alt="Mascota estresada">

                <h3>4. Haz todas las preguntas</h3>
                <p>
                    <ul>¿Está vacunado y desparasitado?</ul>
                    <ul>¿Está esterilizado o debes hacerlo tú?</ul>
                    <ul>¿Tiene alguna condición médica o de comportamiento? </ul>
                </p>

                <h3>5. Prepárate para recibirlo</h3>
                <p>
                    <ul>Comida, camita, platos, arenero (si es gato), correa, juguetes.</ul>
                    <ul>Acondiciona un espacio seguro y tranquilo en tu casa.</ul>
                </p>

                <h3>6. Firma un acta de adopción</h3>
                <p>
                    <ul>Algunas fundaciones lo exigen. Es un compromiso formal.</ul>
                    <ul>Suelen hacer seguimiento para garantizar el bienestar del animal.</ul>
                </p>

                <h3>7. Dale tiempo para adaptarse</h3>
                <p>
                    <ul>Los primeros días pueden ser caóticos.</ul>
                    <ul>No lo fuerces a interactuar. Dale amor y paciencia.</ul>
                </p>

                <h3>8. Sé un tutor responsable</h3>
                <p>
                    <ul>Lleva sus controles veterinarios.</ul>
                    <ul>Sácalo a pasear (si es perro), juega con él, estimúlalo.</ul>
                    <ul>Nunca lo abandones. Si por alguna razón no puedes tenerlo, busca una nueva familia responsable.</ul>
                </p>

            </div>
        </div>
    </div>

    <footer class="public-footer">
        <div class="header-container">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>