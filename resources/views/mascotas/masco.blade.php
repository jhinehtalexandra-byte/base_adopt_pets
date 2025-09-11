@extends('layouts.dentro') 

@section('tablamascotas')
    <div class="container">
        <h1>Lista de Mascotas</h1>

        <table border="1" cellpadding="8" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->id_mascota }}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->especie}}</td>
                        <td>{{ $mascota->edad_aproximada}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay mascotas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
