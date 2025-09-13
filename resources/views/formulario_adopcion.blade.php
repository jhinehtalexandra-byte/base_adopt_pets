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

                        <div class="mb-3">
                            <label class="form-label fw-bold">¿Por qué deseas adoptar esta mascota?</label>
                            <textarea name="motivo" class="form-control" rows="3" required placeholder="Contanos tu motivo..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">¿Tenés experiencia con mascotas?</label>
                            <select name="experiencia" class="form-select" required>
                                <option value="">Seleccioná</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Subí el formulario firmado (PDF)</label>
                            <input type="file" name="pdf_formulario" class="form-control" accept=".pdf" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning btn-lg text-white fw-bold">
                                Enviar Solicitud
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection