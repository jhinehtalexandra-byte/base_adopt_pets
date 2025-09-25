<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Formulario de Adopción') }} - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/formularioadop.css') }}">
    
    <!-- Styles globales -->
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

        /* Estilos específicos del formulario */
        .formulario-section {
            max-width: 1000px;
            margin: 0 auto;
        }

        .formulario-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .formulario-header h1 {
            color: #137035;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .formulario-header p {
            color: #6b7280;
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Corrección para Bootstrap + Tailwind */
        .btn-success {
            background: linear-gradient(135deg, #137035, #22C55E) !important;
            border: none !important;
            padding: 12px 30px !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #0f5d2d, #16833a) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(19, 112, 53, 0.3);
        }

        .form-control {
            border: 2px solid #e5e7eb !important;
            border-radius: 8px !important;
            padding: 12px 16px !important;
            font-size: 16px !important;
            transition: border-color 0.3s ease !important;
        }

        .form-control:focus {
            border-color: #137035 !important;
            box-shadow: 0 0 0 3px rgba(19, 112, 53, 0.1) !important;
        }

        .card {
            border: none !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1) !important;
        }

        .card-header {
            background: linear-gradient(135deg, #137035, #22C55E) !important;
            border-bottom: none !important;
        }

        .alert {
            border-radius: 8px !important;
            border: none !important;
        }

        .alert-success {
            background: #d1fae5 !important;
            color: #065f46 !important;
            border-left: 4px solid #10b981 !important;
        }

        .alert-danger {
            background: #fee2e2 !important;
            color: #991b1b !important;
            border-left: 4px solid #ef4444 !important;
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

            .formulario-header h1 {
                font-size: 2rem;
            }

            .main-content {
                padding: 20px 10px;
            }
        }
    </style>
</head>

<body class="font-sans antialiased formulario-adopcion">
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
                <a href="{{ route('refugios') }}" class="nav-link">{{ __('Refugios') }}</a>
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
            <main class="formulario-section">
                <!-- Encabezado -->
                <div class="formulario-header">
                    <h1>{{ __('Solicitud de Adopción') }}</h1>
                    <p>{{ __('Completa este formulario para iniciar el proceso de adopción de tu nueva mascota. Nos pondremos en contacto contigo para coordinar los siguientes pasos.') }}</p>
                </div>

                <!-- Formulario principal -->
                <div class="container">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-header text-center text-white">
                            <h3 class="mb-0">🐾 Solicitud de Adopción</h3>
                        </div>
                        <div class="card-body p-4">
                            <!-- Mostrar errores de validación -->
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Mostrar mensaje de éxito -->
                            @if (session('success'))
                                <div class="alert alert-success mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('adopcion.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_mascota" value="{{ $mascotaData->id_mascota ?? 1 }}">
                                
                                <!-- Información del usuario -->
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Información Personal') }}</h4>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nombre_adoptante" class="form-label">{{ __('Nombre Completo') }}</label>
                                            <input type="text" class="form-control" id="nombre_adoptante" name="nombre_adoptante" 
                                                   value="{{ Auth::user()->name ?? old('nombre_adoptante') }}" required>
                                            @error('nombre_adoptante')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="email_adoptante" class="form-label">{{ __('Correo Electrónico') }}</label>
                                            <input type="email" class="form-control" id="email_adoptante" name="email_adoptante" 
                                                   value="{{ Auth::user()->email ?? old('email_adoptante') }}" required>
                                            @error('email_adoptante')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">{{ __('Teléfono') }}</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" 
                                                   value="{{ old('telefono') }}" required>
                                            @error('telefono')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="direccion" class="form-label">{{ __('Dirección') }}</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" 
                                                   value="{{ old('direccion') }}" required>
                                            @error('direccion')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Motivo de adopción -->
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Información sobre la Adopción') }}</h4>
                                    
                                    <div class="mb-3">
                                        <label for="motivo" class="form-label">{{ __('Motivo de adopción:') }}</label>
                                        <textarea name="motivo" id="motivo" class="form-control" rows="4" required maxlength="1000" 
                                                  placeholder="Cuéntanos por qué quieres adoptar esta mascota...">{{ old('motivo') }}</textarea>
                                        @error('motivo')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="experiencia" class="form-label">{{ __('¿Tienes experiencia con mascotas?') }}</label>
                                        <select name="experiencia" id="experiencia" class="form-control" required>
                                            <option value="" disabled {{ old('experiencia') ? '' : 'selected' }}>{{ __('Selecciona una opción') }}</option>
                                            <option value="si" {{ old('experiencia') == 'si' ? 'selected' : '' }}>{{ __('Sí, tengo experiencia') }}</option>
                                            <option value="no" {{ old('experiencia') == 'no' ? 'selected' : '' }}>{{ __('No, es mi primera mascota') }}</option>
                                        </select>
                                        @error('experiencia')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tipo_vivienda" class="form-label">{{ __('Tipo de vivienda:') }}</label>
                                        <select name="tipo_vivienda" id="tipo_vivienda" class="form-control" required>
                                            <option value="" disabled {{ old('tipo_vivienda') ? '' : 'selected' }}>{{ __('Selecciona tu tipo de vivienda') }}</option>
                                            <option value="casa" {{ old('tipo_vivienda') == 'casa' ? 'selected' : '' }}>{{ __('Casa con patio') }}</option>
                                            <option value="apartamento" {{ old('tipo_vivienda') == 'apartamento' ? 'selected' : '' }}>{{ __('Apartamento') }}</option>
                                            <option value="finca" {{ old('tipo_vivienda') == 'finca' ? 'selected' : '' }}>{{ __('Finca/Casa rural') }}</option>
                                        </select>
                                        @error('tipo_vivienda')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Documentos -->
                                <div class="mb-4">
                                    <h4 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Documentación') }}</h4>
                                    
                                    <div class="mb-3">
                                        <label for="pdf_formulario" class="form-label">{{ __('Formulario en PDF (opcional):') }}</label>
                                        <input type="file" name="pdf_formulario" id="pdf_formulario" class="form-control" accept="application/pdf">
                                        <div class="form-text text-muted mt-1">{{ __('Puedes adjuntar documentos adicionales si los tienes.') }}</div>
                                        @error('pdf_formulario')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Términos y condiciones -->
                                <div class="mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terminos_adopcion" name="terminos_adopcion" required {{ old('terminos_adopcion') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="terminos_adopcion">
                                            {{ __('Acepto los términos y condiciones de adopción y me comprometo a cuidar responsablemente de la mascota') }}
                                        </label>
                                        @error('terminos_adopcion')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Botón de envío -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        {{ __('Enviar Solicitud de Adopción') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </main>

        @else
            <div class="flex items-center justify-center min-h-screen">
                <div class="text-center">
                    <h1 class="text-2xl font-bold mb-4">{{ __('Acceso Restringido') }}</h1>
                    <p class="mb-4">{{ __('Debes iniciar sesión para acceder al formulario de adopción') }}</p>
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