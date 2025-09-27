<x-layouts.app
    :title="'refugios-admin'"
    bodyClass="Refugios-admin">

    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/refugiosadmin.css') }}">
    @endpush

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                <div style="padding:16px">
                    <div class="container">
                        <div class="header-section">
                            <h1 style="color: #137035;">Lista de Refugios</h1>
                            <a href="{{ route('refugios-admin.create') }}" class="btn-formulario">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                </svg>
                                Registrar Nuevo Refugio
                            </a>
                        </div>
                       
                        <table id="refugios" class="display" style="width:100%; padding: 30px;" border="1" cellpadding="8" cellspacing="0" width="100%">
                            <thead style="background: #f1fdf5">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Responsable</th>
                                    <th>Localidad</th>
                                    <th>Capacidad</th>
                                    <th>Fecha de Registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($refugios as $refugio)
                                    <tr>
                                        <td>{{ $refugio->nombre_refugio}}</td>
                                        <td>{{ $refugio->direccion}}</td>
                                        <td>{{ $refugio->email}}</td>
                                        <td>{{ $refugio->telefono}}</td>
                                        <td>{{ $refugio->responsable}}</td>
                                        <td>{{ $refugio->localidad}}</td>
                                        <td>{{ $refugio->capacidad_maxima}}</td>
                                        <td>{{ $refugio->fecha_registro}}</td>
                                        <td class="flex gap-2">
                                            <a href="{{ route('refugios-admin.edit', $refugio->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-2xl hover:bg-green-600 mr-4">
                                                Editar</a>
                                            <form action="{{ route('refugios-admin.destroy', $refugio->id) }}" method="POST"
                                                onsubmit="return confirm('¿Eliminar?')">
                                                @csrf 
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-2xl hover:bg-green-600 mr-4">Eliminar</button>
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
    
    {{-- jQuery + DataTables (CDN) --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
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
            $('#refugios').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',

                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>

</x-layouts.app>