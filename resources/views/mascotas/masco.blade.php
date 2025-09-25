@extends('layouts.app-adopt-pets') 

@section('title', 'tabla_mascotas')

@section('body-class', 'tabla_mascotas')

@section('extra-css')
    <style>
        {!! file_get_contents(resource_path('css/welcome.css')) !!}
        
        /* AGREGAR ESTOS ESTILOS AQUÍ */
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
@endsection

@section('contenido')

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                <div style="padding:16px">

                    <div class="container">
                        <!-- REEMPLAZAR ESTA LÍNEA -->
                        <!-- <h1 style="padding: 0px 50px 30px 50px; color: #137035;">Lista de Mascotas </h1> -->
                        
                        <!-- CON ESTA NUEVA SECCIÓN -->
                        <div class="header-section">
                            <h1 style="color: #137035;">Lista de Mascotas</h1>
                    <a href="{{ route('mascotas.create') }}" class="btn-formulario">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                        Registrar Nueva Mascota
                    </a>
                        </div>
                       
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
    
    {{-- jQuery + DataTables (CDN) - MANTENER COMO ESTÁ --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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
@endsection