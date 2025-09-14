@extends('dashboard')

@section('title','formulario adopcion')

@section('body-class', 'formulario adopcion')

@section('extra-css')
    <style>
        {!! file_get_contents(resource_path('css/formularioadop.css')) !!}
    </style>
@endsection

@section('contenido')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-center bg-warning text-white">
                        <h3 class="mb-0">🐾 Solicitud de Adopción</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="">
                            @csrf
                            <input type="hidden" name="id_mascota" value="{{ $mascota->id_mascota ?? 1 }}">
                            <label>Motivo de adopción:</label><br>
                            <textarea name="motivo" required maxlength="1000"></textarea><br><br>

                            <label>¿Tenés experiencia con mascotas?</label><br>
                            <select name="experiencia" required>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select><br><br>

                            <label>Subí el formulario en PDF:</label><br>
                            <input type="file" name="pdf_formulario" required accept="application/pdf"><br><br>

                            <button type="submit">Enviar solicitud</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection