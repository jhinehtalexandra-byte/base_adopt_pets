<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Refugios') }} - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/refugios.css') }}">
    
    <!-- Styles globales -->
    <style>
  
        {!! file_get_contents(resource_path('css/refugios.css')) !!}
    
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        body {
            background: #f1fdf5;
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

        .nav-link:hover {
            color: #22C55E;
            background-color: rgba(34, 197, 94, 0.1);
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

        /* Main content */
        .main-content {
            margin-top: 80px;
            padding: 40px 20px;
        }

        /* Responsive */
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

            .nav-link {
                margin: 10px 0;
                width: 200px;
                text-align: center;
            }
        }
    </style>
</head>

<body class="font-sans antialiased refugios">
    <!-- Header -->
    <header>
        <div class="contenedor">
            <a href="{{ route('welcome') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="AdoptPets Logo">
            </a>

            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">☰</label>

            <nav>
                <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                <a href="{{ route('contactanos') }}" class="nav-link">{{ __('Contáctanos') }}</a>
                
                <!-- Cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer; font-family: inherit;">
                        {{ __('Cerrar Sesión') }}
                    </button>
                </form>
            </nav>
        </div>
    </header>

    <div class="main-content">
        @auth
            <main class="refugios-section">
                <!-- Encabezado -->
                <div class="refugios-header">
                    <h1>{{ __('Refugios de Animales') }}</h1>
                    <p>{{ __('Conoce los refugios y organizaciones que trabajan día a día para rescatar, cuidar y encontrar hogares para los animales que más lo necesitan en Bogotá.') }}</p>
                </div>

                <!-- Filtros -->
                <div class="filtros">
                    <button class="filtro-btn active" data-filter="todos">Todos los Refugios</button>
                    <button class="filtro-btn" data-filter="perros y gatos">Especializado en Perros y Gatos</button>
                    <button class="filtro-btn" data-filter="gatos">Especializado en Gatos</button>
                    <button class="filtro-btn" data-filter="cachorros">Para Cachorros</button>
                </div>

    <!-- Grid de Refugios -->
    <div class="refugios-grid" id="refugiosGrid">
      <!-- Fundación Protectora de Animales -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/fundación protectora de animales.png') }}" alt="Fundación Protectora de Animales Bogotá">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Fundación Protectora de Animales Bogotá</h3>
          <p class="refugio-description">Refugio especializado en perros y gatos abandonados</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 26 #68-35 zona industrial</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-234-5678</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>info@protectorabogota.org</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Hogar de Paso San Francisco -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/hogar de paso san francisco.png') }}" alt="Hogar De Paso San Francisco">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Hogar De Paso San Francisco</h3>
          <p class="refugio-description">Centro de rescate y rehabilitación animal</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Carrera 15 #127-45 Usaquén</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-345-6789</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>contacto@hogarsanfrancisco.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Refugio Patitas Felices -->
      <article class="refugio-card" data-type="cachorros">
        <div class="refugio-image">
          <img src="{{ asset('images/Refugio Patitas Felices.png') }}" alt="Refugio Patitas Felices">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Refugio Patitas Felices</h3>
          <p class="refugio-description">Refugio familiar especializado en cachorros</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 170 #45-23 Suba</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-456-7890</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>patitasfelices@gmail.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Fundación Amor Animal -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/fundación amor animal.png') }}" alt="Fundación Amor Animal Chapinero">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Fundación Amor Animal Chapinero</h3>
          <p class="refugio-description">Refugio urbano para animales rescatados</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Carrera 13 #85-67 Chapinero</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-567-8901</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>amoranimal@outlook.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Centro de Adopción La Candelaria -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/centro de adopción la candelaria.png') }}" alt="Centro De Adopción La Candelaria">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Centro De Adopción La Candelaria</h3>
          <p class="refugio-description">Centro histórico de adopción animal</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 10 #3-45 La Candelaria</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-678-9012</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>adopcion@lacandelaria.org</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Refugio Esperanza Animal -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/refugio esperanza animal.png') }}" alt="Refugio Esperanza Animal">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Refugio Esperanza Animal</h3>
          <p class="refugio-description">Refugio con programas de esterilización</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 80 #115-20 Engativá</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-789-0123</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>esperanza@animalrefugio.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Hogar Temporal Fontibón -->
      <article class="refugio-card" data-type="gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/hogar temporal.png') }}" alt="Hogar Temporal Fontibón">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Hogar Temporal Fontibón</h3>
          <p class="refugio-description">Hogar temporal especializado en gatos</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Carrera 100 #25-15 Fontibón</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-890-1234</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>temporal@fontibon.net</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Fundación Rescate Animal Sur -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/fundación rescate animal.jpg') }}" alt="Fundación Rescate Animal Sur">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Fundación Rescate Animal Sur</h3>
          <p class="refugio-description">Refugio comunitario del sur de Bogotá</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 38 Sur #27-45 San Cristóbal</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-901-2345</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>rescatesur@gmail.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Centro Protección Animal Kennedy -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/centro protección animal.png') }}" alt="Centro Protección Animal Kennedy">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Centro Protección Animal Kennedy</h3>
          <p class="refugio-description">Centro integral de protección animal</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Carrera 78 #38-20 Kennedy</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-012-3456</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span>proteccion@kennedy.org</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>

      <!-- Refugio Amigos De Cuatro Patas -->
      <article class="refugio-card" data-type="perros y gatos">
        <div class="refugio-image">
          <img src="{{ asset('images/refugio amigos de cuatro patas.png') }}" alt="Refugio Amigos De Cuatro Patas">
        </div>
        <div class="refugio-content">
          <h3 class="refugio-name">Refugio Amigos De Cuatro Patas</h3>
          <p class="refugio-description">Refugio familiar con adopciones responsables</p>
          <div class="refugio-info">
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
              </svg>
              <span>Calle 134 #52-18 Barrios Unidos</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
              </svg>
              <span>601-123-4567</span>
            </div>
            <div class="info-item">
              <svg class="info-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
              </svg>
              <span> cuatropatas@hotmail.com</span>
            </div>
          </div>
          <div class="refugio-actions">
          </div>
        </div>
      </article>
    </div> <!-- Cierre de refugios-grid -->
  </main>  
  </div> <!-- Cierre de refugios-grid -->
            </main>

            <!-- Script para filtros -->
            <script>
                // Seleccionamos botones y cards
                const filtroBtns = document.querySelectorAll(".filtro-btn");
                const refugios = document.querySelectorAll(".refugio-card");

                filtroBtns.forEach(btn => {
                    btn.addEventListener("click", () => {
                        // Quitar clase activa de todos los botones
                        filtroBtns.forEach(b => b.classList.remove("active"));
                        btn.classList.add("active");

                        const filtro = btn.getAttribute("data-filter");

                        refugios.forEach(card => {
                            if (filtro === "todos" || card.getAttribute("data-type") === filtro) {
                                card.style.display = "block";
                            } else {
                                card.style.display = "none";
                            }
                        });
                    });
                });
            </script>

        @else
            <div class="flex items-center justify-center min-h-screen">
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-4">{{ __('Acceso Restringido') }}</h1>
                    <p class="mb-4">{{ __('Debes iniciar sesión para ver los refugios') }}</p>
                    <a href="{{ route('login') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600">
                        {{ __('Iniciar Sesión') }}
                    </a>
                </div>
            </div>
        @endauth
    </div>

    <!-- Footer -->
    <footer style="background: linear-gradient(135deg, #137035, #1B9E4B); color: white; text-align: center; padding: 40px 20px; margin-top: 60px;">
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - {{ __('Todos los derechos reservados') }} | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </div>
    </footer>
</body>
</html>