<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lista de Mascotas - AdoptPets</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://fonts.googleapis.com/css?family=Noto Sans' rel='stylesheet'>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    
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
        
        /* TUS ESTILOS ORIGINALES */
        .btn-formulario {
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

        .btn-formulario:hover {
            background: linear-gradient(135deg, #0f5d2d, #16833a);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(19, 112, 53, 0.3);
            color: white;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 50px 30px 50px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .btn-editar {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-right: 8px;
        }

        .btn-editar:hover {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: white;
            transform: translateY(-1px);
        }

        .btn-eliminar {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-eliminar:hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            transform: translateY(-1px);
        }

        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }
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
        <!-- TU CONTENIDO ORIGINAL EXACTO -->
        <div class="py-12">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                    <div style="padding:16px">
                        <div class="container">
                            <!-- TU HEADER SECTION ORIGINAL -->
                            <div class="header-section">
                                <h1 style="color: #137035;">Lista de Mascotas</h1>
                                <a href="{{ route('mascotas.create') }}" class="btn-formulario">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                    </svg>
                                    Registrar Nueva Mascota
                                </a>
                            </div>
                           
                            <!-- TU TABLA ORIGINAL EXACTA -->
                            <table id="mascotas" class="display" style="width:100%; padding: 30px;" border="1" cellpadding="8" cellspacing="0" width="100%">
                                <thead style="background: #f1fdf5">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Edad</th>
                                        <th>Refugio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mascotas as $mascota)
                                        <tr>
                                            <td>{{ $mascota->nombre }}</td>
                                            <td>{{ $mascota->especie}}</td>
                                            <td>{{ $mascota->edad_aproximada}}</td>
                                            <td>{{ $mascota->refugio->nombre_refugio}}</td>
                                            <td>
                                                <a href="{{ route('mascotas.edit', $mascota->id_mascota) }}" class="btn-editar">
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                                    </svg>
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('mascotas.destroy', $mascota->id_mascota) }}" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta mascota?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-eliminar">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <!-- Footer -->
    <footer style="background: linear-gradient(135deg, #137035, #1B9E4B); color: white; text-align: center; padding: 40px 20px; margin-top: 60px;">
        <div class="contenedor">
            <p>&copy; 2025 AdoptPets - Todos los derechos reservados</p>
        </div>
    </footer>

    <!-- TUS SCRIPTS ORIGINALES EXACTOS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script>
        $(function() {
            $('#mascotas').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</body>
</html>