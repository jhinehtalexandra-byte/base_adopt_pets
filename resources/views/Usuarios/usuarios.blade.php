<x-layouts.app
    :title="'usuarios'"
    bodyClass="usuarios">

    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/refugiosadmin.css') }}">
    @endpush

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-10">
                <div class="header-section">
                    <h1 style="color: #137035;font-weight: bold; font-size: large;">Lista de Adoptantes</h1>
                    <a href="{{ route('usuarios.create') }}" class="btn-formulario">Registrar Nuevo Adoptante</a>
                </div>
                <table id="adoptantes" class="display w-full" border="1" cellpadding="8" cellspacing="0">
                    <thead style="background: #f1fdf5">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Direccion</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Cedula</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adoptantes as $adoptante)
                        <tr>
                            <td>{{ $adoptante->nombre }}</td>
                            <td>{{ $adoptante->apellido }}</td>
                            <td>{{ $adoptante->direccion }}</td>
                            <td>{{ $adoptante->email }}</td>
                            <td>{{ $adoptante->telefono }}</td>
                            <td>{{ $adoptante->cedula }}</td>
                            <td>{{ $adoptante->fecha_registro }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('usuarios.edit', $adoptante) }}" class="bg-green-500 text-white px-4 py-2 rounded-2xl hover:bg-green-600 mr-4">Editar</a>
                                <form action="{{ route('usuarios.destroy', $adoptante) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
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
            $('#adoptantes').DataTable({
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