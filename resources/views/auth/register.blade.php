@extends('dashboard')

@section('title', 'registro')

@section('body-class', 'registro')

@section('extra-css')
  <style>
    {!! file_get_contents(resource_path('css/register.css')) !!}
  </style>
@endsection

@section('contenido')
  <section class="registro-container">
    <div class="registro-formulario">
      <h1>AdoptPets</h1>
      <h2>CREAR CUENTA</h2>
      <p>Regístrate para encontrar y adoptar a tu nuevo amigo,<br>o registra tu refugio para ayudar a más mascotas</p>

      {{-- Mostrar errores de validación --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Mostrar mensaje de éxito --}}
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      {{-- Mostrar mensaje de error --}}
      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" id="registroForm">
        @csrf
        
        {{-- Selector de tipo de usuario --}}
        <div class="tipo-usuario">
          <div class="tipo-opcion active" id="adoptante-option">
            <input type="radio" 
                   id="adoptante" 
                   name="tipo_usuario" 
                   value="adoptante" 
                   {{ old('tipo_usuario', 'adoptante') == 'adoptante' ? 'checked' : '' }}>
            <label for="adoptante">🐕 Adoptante</label>
          </div>
          <div class="tipo-opcion" id="refugio-option">
            <input type="radio" 
                   id="refugio" 
                   name="tipo_usuario" 
                   value="refugio" 
                   {{ old('tipo_usuario') == 'refugio' ? 'checked' : '' }}>
            <label for="refugio">🏠 Refugio</label>
          </div>
        </div>
        @error('tipo_usuario')
          <span class="error">{{ $message }}</span>
        @enderror

        {{-- Campos para Adoptante --}}
        <div id="adoptante-fields" class="adoptante-fields">
          <div class="fila">
            <input type="text" 
                   name="nombre" 
                   placeholder="Nombre" 
                   value="{{ old('nombre') }}" 
                   required>
            <input type="text" 
                   name="apellido" 
                   placeholder="Apellido" 
                   value="{{ old('apellido') }}" 
                   required>
          </div>
          @error('nombre')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('apellido')
            <span class="error">{{ $message }}</span>
          @enderror

          <div class="fila single">
            <input type="email" 
                   name="email" 
                   placeholder="Correo electrónico" 
                   value="{{ old('email') }}" 
                   required>
          </div>
          @error('email')
            <span class="error">{{ $message }}</span>
          @enderror

          <div class="fila">
            <input type="text" 
                   name="direccion" 
                   placeholder="Dirección" 
                   value="{{ old('direccion') }}">
            <input type="tel" 
                   name="telefono" 
                   placeholder="Teléfono" 
                   value="{{ old('telefono') }}">
          </div>
          @error('direccion')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('telefono')
            <span class="error">{{ $message }}</span>
          @enderror

          <div class="fila">
            <select name="tipo_documento" required>
              <option value="" disabled {{ old('tipo_documento') ? '' : 'selected' }}>Tipo de documento</option>
              <option value="cc" {{ old('tipo_documento') == 'cc' ? 'selected' : '' }}>Cédula de Ciudadanía (C.C.)</option>
              <option value="ce" {{ old('tipo_documento') == 'ce' ? 'selected' : '' }}>Cédula de Extranjería (C.E.)</option>
              <option value="ti" {{ old('tipo_documento') == 'ti' ? 'selected' : '' }}>Tarjeta de Identidad (T.I.)</option>
              <option value="pp" {{ old('tipo_documento') == 'pp' ? 'selected' : '' }}>Pasaporte (P.P.)</option>
            </select>
            <input type="text" 
                   name="numero_documento" 
                   placeholder="Número de documento" 
                   value="{{ old('numero_documento') }}" 
                   required>
          </div>
          @error('tipo_documento')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('numero_documento')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        {{-- Campos para Refugio --}}
        <div id="refugio-fields" class="refugio-fields {{ old('tipo_usuario') == 'refugio' ? 'active' : '' }}">
          <div class="fila">
            <input type="text" 
                   name="nombre_refugio" 
                   placeholder="Nombre refugio" 
                   value="{{ old('nombre_refugio') }}">
            <input type="text" 
                   name="nombre_representante" 
                   placeholder="Nombre representante" 
                   value="{{ old('nombre_representante') }}">
          </div>
          @error('nombre_refugio')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('nombre_representante')
            <span class="error">{{ $message }}</span>
          @enderror
        

          <div class="fila single">
            <input type="email" 
                   name="correo_refugio" 
                   placeholder="Correo electrónico del refugio" 
                   value="{{ old('correo_refugio') }}">
          </div>
          @error('correo_refugio')
            <span class="error">{{ $message }}</span>
          @enderror

          <div class="fila">
            <input type="text" 
                   name="direccion_refugio" 
                   placeholder="Dirección del refugio" 
                   value="{{ old('direccion_refugio') }}">
            <input type="tel" 
                   name="telefono_refugio" 
                   placeholder="Teléfono del refugio" 
                   value="{{ old('telefono_refugio') }}">
          </div>
          @error('direccion_refugio')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('telefono_refugio')
            <span class="error">{{ $message }}</span>
          @enderror

          <div class="fila">
            <select name="tipo_documento_refugio" required>
              <option value="" disabled {{ old('tipo_documento_refugio') ? '' : 'selected' }}>Tipo de documento</option>
              <option value="cc" {{ old('tipo_documento_refugio') == 'cc' ? 'selected' : '' }}>Cédula de Ciudadanía (C.C.)</option>
              <option value="ce" {{ old('tipo_documento_refugio') == 'ce' ? 'selected' : '' }}>Cédula de Extranjería (C.E.)</option>
              <option value="ti" {{ old('tipo_documento_refugio') == 'ti' ? 'selected' : '' }}>Tarjeta de Identidad (T.I.)</option>
              <option value="pp" {{ old('tipo_documento_refugio') == 'pp' ? 'selected' : '' }}>Pasaporte (P.P.)</option>
            </select>
            <input type="text" 
                   name="numero_documento_representante" 
                   placeholder="Num doc representante" 
                   value="{{ old('numero_documento_representante') }}">
          </div>
          @error('tipo_documento_refugio')
            <span class="error">{{ $message }}</span>
          @enderror
          @error('numero_documento_representante')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        
        {{-- Campos de contraseña (comunes para ambos) --}}
        <div class="fila single">
          <input type="password" 
                 name="password" 
                 placeholder="Contraseña" 
                 required 
                 minlength="8">
        </div>
        @error('password')
          <span class="error">{{ $message }}</span>
        @enderror

        <div class="fila single">
          <input type="password" 
                 name="password_confirmation" 
                 placeholder="Confirmar contraseña" 
                 required 
                 minlength="8">
        </div>

        {{-- Términos y condiciones --}}
        <div class="terminos">
          <input type="checkbox" 
                 id="terminos" 
                 name="terminos" 
                 {{ old('terminos') ? 'checked' : '' }} 
                 required>
          <label for="terminos">
            Acepto los <a href="#" target="_blank">Términos y condiciones</a>
          </label>
        </div>
        @error('terminos')
          <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Registrarse</button>
      </form>

      <div class="registro-opciones">
        <p class="login-link">
          ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </p>
      </div>
    </div>

    <div class="registro-imagen">
      <img src="{{ asset('images/gatoyperro.jpeg') }}" alt="Perros y gatos">
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const adoptanteOption = document.getElementById('adoptante-option');
      const refugioOption = document.getElementById('refugio-option');
      const adoptanteRadio = document.getElementById('adoptante');
      const refugioRadio = document.getElementById('refugio');
      const adoptanteFields = document.getElementById('adoptante-fields');
      const refugioFields = document.getElementById('refugio-fields');

      function toggleUserType() {
        if (adoptanteRadio.checked) {
          adoptanteOption.classList.add('active');
          refugioOption.classList.remove('active');
          adoptanteFields.style.display = 'block';
          refugioFields.classList.remove('active');
          
          // Hacer requeridos los campos de adoptante
          const adoptanteInputs = adoptanteFields.querySelectorAll('input[required], select[required]');
          adoptanteInputs.forEach(input => input.required = true);
          
          // Quitar requeridos de refugio
          const refugioInputs = refugioFields.querySelectorAll('input, select');
          refugioInputs.forEach(input => input.required = false);
          
        } else if (refugioRadio.checked) {
          refugioOption.classList.add('active');
          adoptanteOption.classList.remove('active');
          adoptanteFields.style.display = 'none';
          refugioFields.classList.add('active');
          
          // Hacer requeridos los campos de refugio
          const refugioInputs = refugioFields.querySelectorAll('input, select');
          refugioInputs.forEach(input => input.required = true);
          
          // Quitar requeridos de adoptante
          const adoptanteInputs = adoptanteFields.querySelectorAll('input, select');
          adoptanteInputs.forEach(input => input.required = false);
        }
      }

      // Event listeners para los clicks en las opciones
      adoptanteOption.addEventListener('click', function() {
        adoptanteRadio.checked = true;
        toggleUserType();
      });

      refugioOption.addEventListener('click', function() {
        refugioRadio.checked = true;
        toggleUserType();
      });

      // Event listeners para los radios
      adoptanteRadio.addEventListener('change', toggleUserType);
      refugioRadio.addEventListener('change', toggleUserType);

      // Inicializar el estado correcto
      toggleUserType();
    });
  </script>
@endsection