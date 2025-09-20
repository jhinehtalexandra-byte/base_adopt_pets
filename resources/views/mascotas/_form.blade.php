{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <strong>¡Hay algunos errores!</strong>
        <ul class="mt-2">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Columna Izquierda --}}
    <div class="space-y-6">
        {{-- Nombre --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="nombre">
                Nombre de la mascota *
            </label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre', $mascota->nombre ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nombre') border-red-500 @enderror"
                required
            >
            @error('nombre')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Especie --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="especie">
                Especie *
            </label>
            <select 
                id="especie" 
                name="especie" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('especie') border-red-500 @enderror"
                required
            >
                <option value="">Seleccionar especie</option>
                <option value="perro" {{ old('especie', $mascota->especie ?? '') == 'perro' ? 'selected' : '' }}>Perro</option>
                <option value="gato" {{ old('especie', $mascota->especie ?? '') == 'gato' ? 'selected' : '' }}>Gato</option>
                <option value="conejo" {{ old('especie', $mascota->especie ?? '') == 'conejo' ? 'selected' : '' }}>Conejo</option>
                <option value="ave" {{ old('especie', $mascota->especie ?? '') == 'ave' ? 'selected' : '' }}>Ave</option>
                <option value="otro" {{ old('especie', $mascota->especie ?? '') == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('especie')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Raza --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="raza">
                Raza
            </label>
            <input 
                type="text" 
                id="raza" 
                name="raza" 
                value="{{ old('raza', $mascota->raza ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('raza') border-red-500 @enderror"
            >
            @error('raza')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Edad y Peso en la misma fila --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="edad_aproximada">
                    Edad (años)
                </label>
                <input 
                    type="number" 
                    id="edad_aproximada" 
                    name="edad_aproximada" 
                    value="{{ old('edad_aproximada', $mascota->edad_aproximada ?? '') }}"
                    min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('edad_aproximada') border-red-500 @enderror"
                >
                @error('edad_aproximada')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2" for="peso">
                    Peso (kg)
                </label>
                <input 
                    type="number" 
                    step="0.01"
                    id="peso" 
                    name="peso" 
                    value="{{ old('peso', $mascota->peso ?? '') }}"
                    min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('peso') border-red-500 @enderror"
                >
                @error('peso')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Sexo --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Sexo *
            </label>
            <div class="flex gap-4">
                <label class="inline-flex items-center">
                    <input 
                        type="radio" 
                        name="sexo" 
                        value="macho" 
                        {{ old('sexo', $mascota->sexo ?? '') == 'macho' ? 'checked' : '' }}
                        class="form-radio text-green-600"
                        required
                    >
                    <span class="ml-2">Macho</span>
                </label>
                <label class="inline-flex items-center">
                    <input 
                        type="radio" 
                        name="sexo" 
                        value="hembra" 
                        {{ old('sexo', $mascota->sexo ?? '') == 'hembra' ? 'checked' : '' }}
                        class="form-radio text-green-600"
                        required
                    >
                    <span class="ml-2">Hembra</span>
                </label>
            </div>
            @error('sexo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tamaño --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="tamaño">
                Tamaño *
            </label>
            <select 
                id="tamaño" 
                name="tamaño" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('tamaño') border-red-500 @enderror"
                required
            >
                <option value="">Seleccionar tamaño</option>
                <option value="pequeño" {{ old('tamaño', $mascota->tamaño ?? '') == 'pequeño' ? 'selected' : '' }}>Pequeño</option>
                <option value="mediano" {{ old('tamaño', $mascota->tamaño ?? '') == 'mediano' ? 'selected' : '' }}>Mediano</option>
                <option value="grande" {{ old('tamaño', $mascota->tamaño ?? '') == 'grande' ? 'selected' : '' }}>Grande</option>
            </select>
            @error('tamaño')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    {{-- Columna Derecha --}}
    <div class="space-y-6">
        {{-- Color --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="color">
                Color
            </label>
            <input 
                type="text" 
                id="color" 
                name="color" 
                value="{{ old('color', $mascota->color ?? '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('color') border-red-500 @enderror"
            >
            @error('color')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Refugio --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="id_refugio">
                Refugio *
            </label>
            <select 
                id="id_refugio" 
                name="id_refugio" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('id_refugio') border-red-500 @enderror"
                required
            >
                <option value="">Seleccionar refugio</option>
                @foreach($refugios as $refugio)
                    <option value="{{ $refugio->id_refugio }}" 
                        {{ old('id_refugio', $mascota->id_refugio ?? '') == $refugio->id_refugio ? 'selected' : '' }}>
                        {{ $refugio->nombre_refugio }}
                    </option>
                @endforeach
            </select>
            @error('id_refugio')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Fecha de Ingreso --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="fecha_ingreso">
                Fecha de Ingreso *
            </label>
            <input 
                type="date" 
                id="fecha_ingreso" 
                name="fecha_ingreso" 
                value="{{ old('fecha_ingreso', $mascota && $mascota->fecha_ingreso ? $mascota->fecha_ingreso->format('Y-m-d') : '') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('fecha_ingreso') border-red-500 @enderror"
                required
            >
            @error('fecha_ingreso')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Estado de Adopción --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2" for="estado_adopcion">
                Estado de Adopción
            </label>
            <select 
                id="estado_adopcion" 
                name="estado_adopcion" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('estado_adopcion') border-red-500 @enderror"
            >
                <option value="disponible" {{ old('estado_adopcion', $mascota->estado_adopcion ?? 'disponible') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="en proceso" {{ old('estado_adopcion', $mascota->estado_adopcion ?? '') == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="adoptado" {{ old('estado_adopcion', $mascota->estado_adopcion ?? '') == 'adoptado' ? 'selected' : '' }}>Adoptado</option>
                <option value="no disponible" {{ old('estado_adopcion', $mascota->estado_adopcion ?? '') == 'no disponible' ? 'selected' : '' }}>No disponible</option>
            </select>
            @error('estado_adopcion')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Checkboxes de Salud --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">
                Estado de Salud
            </label>
            <div class="space-y-2">
                <label class="inline-flex items-center">
                    <input 
                        type="checkbox" 
                        name="vacunado" 
                        value="1"
                        {{ old('vacunado', $mascota->vacunado ?? false) ? 'checked' : '' }}
                        class="form-checkbox text-green-600"
                    >
                    <span class="ml-2">Vacunado</span>
                </label>
                <br>
                <label class="inline-flex items-center">
                    <input 
                        type="checkbox" 
                        name="esterilizado" 
                        value="1"
                        {{ old('esterilizado', $mascota->esterilizado ?? false) ? 'checked' : '' }}
                        class="form-checkbox text-green-600"
                    >
                    <span class="ml-2">Esterilizado</span>
                </label>
                <br>
                <label class="inline-flex items-center">
                    <input 
                        type="checkbox" 
                        name="microchip" 
                        value="1"
                        {{ old('microchip', $mascota->microchip ?? false) ? 'checked' : '' }}
                        class="form-checkbox text-green-600"
                    >
                    <span class="ml-2">Con Microchip</span>
                </label>
            </div>
        </div>
    </div>
</div>

{{-- Campos de texto largo --}}
<div class="mt-6 space-y-6">
    {{-- Descripción --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2" for="descripcion">
            Descripción
        </label>
        <textarea 
            id="descripcion" 
            name="descripcion" 
            rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('descripcion') border-red-500 @enderror"
            placeholder="Describe las características y personalidad de la mascota..."
        >{{ old('descripcion', $mascota->descripcion ?? '') }}</textarea>
        @error('descripcion')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Estado de Salud --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2" for="estado_salud">
            Estado de Salud Detallado
        </label>
        <textarea 
            id="estado_salud" 
            name="estado_salud" 
            rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent @error('estado_salud') border-red-500 @enderror"
            placeholder="Detalles sobre el estado de salud, tratamientos, medicamentos, etc..."
        >{{ old('estado_salud', $mascota->estado_salud ?? '') }}</textarea>
        @error('estado_salud')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>