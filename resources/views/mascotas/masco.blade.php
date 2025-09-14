@extends('dashboard') 

@section('title', 'tabla_mascotas')

@section('body-class', 'tabla_mascotas')

@section('extra-css')
    <style>
        {!! file_get_contents(resource_path('css/welcome.css')) !!}
    </style>
@endsection

@section('contenido')

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg">
                <div style="padding:16px">

                    <div class="container">
                        <h1 style="padding: 0px 50px 30px 50px; color: #137035;">Lista de Mascotas </h1>
                       
                        <table id="mascotas" class="display" style="width:100%; padding: 30px;" border="1" cellpadding="8" cellspacing="0" width="100%">
                            <thead style="background: #f1fdf5">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Edad</th>
                                    <th>Refugio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mascotas as $mascota)
                                    <tr>
                                        <td>{{ $mascota->nombre }}</td>
                                        <td>{{ $mascota->especie}}</td>
                                        <td>{{ $mascota->edad_aproximada}}</td>
                                        <td>{{ $mascota->refugio->nombre_refugio}}</td>
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


