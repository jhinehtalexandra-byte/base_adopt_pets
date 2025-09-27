<x-layouts.app :title="'Editar Adoptante'" bodyClass="usuarios">

    <div class="bg-white shadow-xl sm:rounded-lg p-6 max-w-2xl mx-auto">
        <h1 class="text-xl font-bold text-green-700 mb-6">Editar Adoptante</h1>

        <form action="{{ route('usuarios.update', $adoptante) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block font-semibold mb-1">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $adoptante->nombre) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="apellido" class="block font-semibold mb-1">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="{{ old('apellido', $adoptante->apellido) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="direccion" class="block font-semibold mb-1">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $adoptante->direccion) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Correo:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $adoptante->email) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="telefono" class="block font-semibold mb-1">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $adoptante->telefono) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label for="cedula" class="block font-semibold mb-1">Cédula:</label>
                <input type="text" name="cedula" id="cedula" value="{{ old('cedula', $adoptante->cedula) }}" class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Actualizar</button>
            <a href="{{ route('usuarios.index') }}" class="ml-4 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
        </form>
    </div>

</x-layouts.app>
