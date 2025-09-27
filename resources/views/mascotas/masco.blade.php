<x-layouts.app
    :title="'mascotas'"
    bodyClass="Mascotas">
    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/mascota.css') }}">
    @endpush

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                <div style="padding:16px">

                    <div class="container">
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
                                        <td class="flex gap-2">
                                            <a href="{{ route('mascotas.edit', $mascota->id_mascota) }}" class="bg-green-500 text-white px-4 py-2 rounded-2xl hover:bg-green-600 mr-4">
                                                Editar</a>
                                            <form action="{{ route('mascotas.destroy', $mascota->id_mascota) }}" method="POST"
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
</body>
</html>