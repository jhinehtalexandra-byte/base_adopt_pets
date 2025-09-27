<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registrar Nueva Mascota - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Noto Sans', sans-serif;
        }

        body {
            background: #f8fafc;
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

        /* Main content */
        .main-content {
            margin-top: 80px;
            padding: 40px 20px;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 0 auto;
        }

        .btn-guardar {
            background: linear-gradient(135deg, #137035, #1a8f42);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(19, 112, 53, 0.2);
        }

        .btn-guardar:hover {
            background: linear-gradient(135deg, #0f5d2d, #16833a);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(19, 112, 53, 0.3);
            color: white;
        }

        .btn-cancelar {
            background: #6b7280;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cancelar:hover {
            background: #4b5563;
            color: white;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Header -->
    <header>
        <div class="contenedor">
            <a href="{{ route('welcome') }}" class="logo">
                <img src="{{ asset('images/AdoptPets.png') }}" alt="AdoptPets Logo">
            </a>

            <nav>
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('mascotas.index') }}" class="nav-link">Mascotas</a>
                <a href="{{ route('reportes') }}" class="nav-link">Reportes</a>
                               
                <!-- Dropdown de usuario -->
                <div class="relative">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; cursor: pointer;">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <div class="main-content">
        <div class="form-container">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900" style="color: #137035;">
                    Registrar Nueva Mascota
                </h1>
                <p class="mt-2 text-gray-600">
                    Complete el formulario para agregar una nueva mascota al sistema
                </p>
            </div>

            <form action="{{ route('mascotas.store') }}" method="POST" class="space-y-6">
                @csrf
                @include('mascotas._form', [
                    'mascota' => null,
                    'refugios' => $refugios,
                ])
                
                <div class="pt-6 flex gap-3 border-t border-gray-200">
                    <button type="submit" class="btn-guardar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                        </svg>
                        Guardar Mascota
                    </button>
                    <a href="{{ route('mascotas.index') }}" class="btn-cancelar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background: linear-gradient(135deg, #137035, #1B9E4B); color: white; text-align: center; padding: 40px 20px; margin-top: 60px;">
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
        </div>
    </footer>
</body>
</html>