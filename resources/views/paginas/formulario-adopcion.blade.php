<x-layouts.app-adopt-pets
    :title="'Adopcion - Adoptpets'"
    bodyClass="Adopcion">
    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/formularioadopcion.css') }}">
    @endpush

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
    </div>
    
</x-layouts.app-adopt-pets>
