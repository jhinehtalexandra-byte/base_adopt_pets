<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdoptPets - Adopta a tu alma gemela</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Styles -->
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
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .contenedor {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo img {
            height: 30px;
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

        .nav-link:hover {
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

        /* Hero Section */
        #adoptpets {
            padding: 140px 0 130px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #22C55E;
            background-image: url("{{ asset('images/perros.jpg') }}");
            background-repeat: no-repeat;
            background-position: top center;
            background-size: 1300px;
            position: relative;
        }

        #adoptpets::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.2);
        }

        .img-contenedor {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 100px 0;
        }

        #adoptpets h1 {
            font-size: 100px;
            margin: 10px;
            color: #22C55E;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        #adoptpets p {
            font-size: 24px;
            color: #1B9E4B;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        /* Botones principales */
        .botones-principales {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .boton-principal {
            background: linear-gradient(135deg, #22C55E, #1B9E4B);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(34, 197, 94, 0.3);
        }

        .boton-principal:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.4);
        }

        .boton-secundario {
            background: transparent;
            color: #22C55E;
            padding: 15px 30px;
            border: 2px solid #22C55E;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .boton-secundario:hover {
            background: #22C55E;
            color: white;
            transform: translateY(-3px);
        }

        /* News Section */
        #noticias {
            padding: 80px 20px;
            background-color: #ffffff;
        }

        .contenedor-noticias {
            max-width: 1200px;
            margin: 0 auto;
        }

        .titulo-principal {
            font-size: 2.5em;
            font-weight: bold;
            color: #22C55E;
            text-align: center;
            margin-bottom: 40px;
        }

        .noticias-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            align-items: start;
        }

        .noticia-principal {
            background-color: #e8f5e8;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .noticia-principal h3 {
            font-size: 1.8em;
            font-weight: bold;
            color: #137035;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .noticia-principal p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
            text-align: justify;
        }

        .noticia-principal img {
            width: 100%;
            max-width: 400px;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
            margin: 20px auto;
            display: block;
        }

        .noticias-secundarias {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 100px;
        }

        .titulo-secundarias {
            font-size: 1.3em;
            font-weight: bold;
            color: #137035;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 2px solid #22C55E;
            padding-bottom: 10px;
        }

        .noticia-card {
            background-color: #e8f5e8;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .noticia-card:hover {
            transform: translateY(-2px);
        }

        .noticia-card h4 {
            font-size: 1.1em;
            font-weight: bold;
            color: #137035;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .noticia-card p {
            font-size: 14px;
            color: #333;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .link-noticia {
            color: #22C55E;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .link-noticia:hover {
            color: #1B9E4B;
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #137035, #1B9E4B);
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;
        }

        /* Menu hamburguesa para móviles */
        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: #137035;
        }

        #menu-toggle {
            display: none;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .noticias-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .noticias-secundarias {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .menu-icon {
                display: block;
            }

            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: white;
                flex-direction: column;
                justify-content: flex-start;
                padding-top: 50px;
                transition: left 0.3s ease;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            #menu-toggle:checked ~ nav {
                left: 0;
            }

            .nav-link, .boton {
                margin: 10px 0;
                width: 200px;
                text-align: center;
            }

            #adoptpets {
                background-size: 160%;
                padding: 120px 0 80px 0;
            }

            #adoptpets h1 {
                font-size: 60px;
            }

            #adoptpets p {
                font-size: 18px;
            }

            .img-contenedor {
                padding: 50px 0;
            }

            .botones-principales {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .boton-principal, .boton-secundario {
                width: 250px;
                text-align: center;
            }

            .titulo-principal {
                font-size: 2em;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <header>
        <div class="contenedor">
            <a href="{{ route('welcome') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="AdoptPets Logo">
            </a>

            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">☰</label>

            <nav>
                <a href="{{ route('quienes-somos') }}" class="nav-link">¿Quiénes Somos?</a>
                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
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

    <!-- Hero Section -->
    <section id="adoptpets">
        <div class="img-contenedor">
            <h1>AdoptPets</h1>
            <p>Adopta a tu alma gemela</p>
            
            <div class="botones-principales">
                @guest
                    <a href="{{ route('register') }}" class="boton-principal">Comenzar Adopción</a>
                    <a href="#noticias" class="boton-secundario">Ver Noticias</a>
                @else
                    <a href="{{ route('dashboard') }}" class="boton-principal">Mi Dashboard</a>
                    <a href="#noticias" class="boton-secundario">Ver Noticias</a>
                @endguest
            </div>
        </div>
    </section>
    
    <!-- News Section -->
    <section id="noticias">
        <div class="contenedor-noticias">
            <h2 class="titulo-principal">Actualidad sobre adopción</h2>
            
            <div class="noticias-grid">
                <!-- Columna Izquierda - Noticias Principales -->
                <div class="columna-izquierda">
                    <div class="noticia-principal">
                        <h3>Día Internacional de los Animales Callejeros: Mejor futuro para los abandonados</h3>
                        <p>
                            El Día Internacional de los Animales Callejeros, celebrado cada 4 de abril, busca concientizar sobre la difícil 
                            situación de millones de animales abandonados en el mundo. En Argentina, se estima que hay 8 millones de perros
                            y gatos en estado de abandono, mientras que a nivel global la cifra supera los 600 millones.
                        </p>
                        <img src="{{ asset('images/Wel_adopcion-virtual-animales.jpg') }}" alt="Animales callejeros" />
                        <p>
                            La adopción es una solución clave, ya que brinda una segunda oportunidad a estos animales y alivia la sobrepoblación 
                            en refugios. Adoptar en lugar de comprar no solo salva vidas, sino que es un acto de amor y solidaridad que transforma 
                            tanto a los animales como a las personas que les abren sus hogares.
                        </p>
                        <div class="hashtags">
                            #AdoptaNoCompres #DíaDeLosAnimalesCallejeros
                        </div>
                    </div>

                    <div class="noticia-principal">
                        <h3>¿Por qué adoptar una mascota? 7 razones para considerarlo</h3>
                        <img src="{{ asset('images/perrosygatos.png') }}" alt="Perros y gatos para adopción" />
                        <p>
                            1. Salvas una vida<br>
                            2. Te hacen compañía<br>
                            3. No apoyarás a tiendas que las venden<br>
                            4. Te mantienen activo<br>
                            5. Le das oportunidad a otros<br>
                            6. Te ayudan a distraerte<br>
                            7. Te brindan amor incondicional
                        </p>
                    </div>

                    <div class="noticia-principal">
                        <h3>¿Debería esterilizar a mi perro o gato adoptado?</h3>
                        <p>
                            Adoptar una mascota es una gran responsabilidad, y una de las decisiones más importantes es si esterilizar 
                            a su nuevo compañero. La esterilización puede ayudar a reducir el riesgo de ciertos tipos de cáncer y 
                            problemas de comportamiento como la agresión y el marcaje de territorio.
                        </p>
                        <img src="{{ asset('images/Esterilizar_mascotas.png') }}" alt="Esterilización de mascotas" />
                    </div>
                </div>

                <!-- Columna Derecha - Noticias Secundarias -->
                <div class="noticias-secundarias">
                    <h3 class="titulo-secundarias">También podría interesarte:</h3>
                    
                    <div class="noticia-card">
                        <h4>Jornada de adopción el 5 de abril de 2025</h4>
                        <p>El IDPYBA realizó una jornada de adopción en el Show Place Centro Comercial. Perros y gatos rescatados esperaban encontrar un hogar lleno de amor.</p>
                        <a href="#" class="link-noticia">Leer más</a>
                    </div>

                    <div class="noticia-card">
                        <h4>Cuatro jornadas de adopción en marzo de 2025</h4>
                        <p>El IDPYBA organizó cuatro jornadas durante marzo en diferentes puntos de la ciudad, incluyendo centros comerciales y parques.</p>
                        <a href="#" class="link-noticia">Leer más</a>
                    </div>

                    <div class="noticia-card">
                        <h4>Plataforma digital para adopciones</h4>
                        <p>"Huellas que Salvan" conecta a perros y gatos en situación de vulnerabilidad con familias dispuestas a brindarles un hogar.</p>
                        <a href="#" class="link-noticia">Leer más</a>
                    </div>

                    <div class="noticia-card">
                        <h4>13 animales encontraron nuevo hogar</h4>
                        <p>Durante una jornada en Theatron, decenas de personas llegaron con el objetivo de brindar una nueva oportunidad a estos animalitos.</p>
                        <a href="#" class="link-noticia">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>
</body>
</html>