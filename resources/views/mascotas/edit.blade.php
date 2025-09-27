<form action="{{ route('mascotas.update', $mascota) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    @include('mascotas._form', [
        'mascota' => $mascota,
        'refugios' => $refugios,
    ])
    <div class="pt-4 flex gap-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
        <a href="{{ route('mascotas.index') }}" 
            class="px-4 py-2 border rounded">Cancelar</a>
    </div>
</form>