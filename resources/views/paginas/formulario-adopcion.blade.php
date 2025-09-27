<x-layouts.app
    :title="'usuarios'"
    bodyClass="usuarios">

    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/formulario_adopcion.css') }}">
    @endpush

    <div class="form-container">
        <h2> 🐾 Formulario de Adopción</h2>

        <!-- Mascota seleccionada -->
        @if(request('nombre'))
            <div class="mascota-seleccionada" style="text-align:center; margin-bottom:20px;">
                <h3>Mascota seleccionada: {{ request('nombre') }}</h3>
                <img src="{{ request('imagen') }}" alt="{{ request('nombre') }}" style="max-width:200px; border-radius:10px; margin:10px 0;">
            </div>
        @endif

        <form>
            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" required>
            </div>

            <!-- Tipo de documento -->
            <div class="form-group">
                <label>Tipo de documento</label>
                <select required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="cc">Cédula de ciudadanía</option>
                    <option value="ce">Cédula de extranjería</option>
                    <option value="pasaporte">Pasaporte</option>
                    <option value="carnet_diplomatico">Carnet diplomático</option>
                </select>
            </div>

            <!-- Número de documento -->
            <div class="form-group">
                <label>Número de documento</label>
                <input type="text" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" required>
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text" required>
            </div>

            <div class="form-group">
                <label>Ciudad</label>
                <input type="text" value="Bogotá">
            </div>

            <hr>

            <div class="form-group">
                <label>Mascota de interés</label>
                <input type="text" name="mascota" value="{{ request('nombre') }}" readonly>
            </div>

            <div class="form-group">
                <label>¿Por qué quieres adoptar esta mascota?</label>
                <textarea></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset" class="btn btn-secondary">Cancelar</button>
            </div>
        </form>
    </div>
    
</x-layouts.app>
