<x-layouts.app
    :title="'Registrar Refugio'"
    bodyClass="Refugios-admin">

    @push('extra-css')
        <link rel="stylesheet" href="{{ asset('css/refugiosadmin.css') }}">
    @endpush

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-green-700 mb-6">Registrar Nuevo Refugio</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('refugios-admin.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block font-semibold mb-1">Nombre del Refugio</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Dirección</label>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Correo</label>
                        <input type="email" name="correo" value="{{ old('correo') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Responsable</label>
                        <input type="text" name="responsable" value="{{ old('responsable') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Localidad</label>
                        <input type="text" name="localidad" value="{{ old('localidad') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Capacidad máxima</label>
                        <input type="number" name="capacidad_maxima" value="{{ old('capacidad_maxima') }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex gap-2 mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-2xl">Registrar</button>
                        <a href="{{ route('refugios-admin.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-2xl">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
