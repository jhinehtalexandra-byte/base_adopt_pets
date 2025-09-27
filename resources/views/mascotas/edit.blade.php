<x-layouts.app
    :title="'usuarios'"
    bodyClass="usuarios">

    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/refugiosadmin.css') }}">
    @endpush
    <style>
        {!! file_get_contents(resource_path('css/welcome.css')) !!}
        
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        
        .btn-guardar {
            background: linear-gradient(135deg, #137035, #1a8f42);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(19, 112, 53, 0.2);
        }

        .btn-guardar:hover {
            background: linear-gradient(135deg, #0f5d2d, #16833a);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(19, 112, 53, 0.3);
            color: white;
        }

        .btn-cancelar {
            background: #6b7280;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cancelar:hover {
            background: #4b5563;
            color: white;
        }
    </style>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form-container">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900" style="color: #137035;">
                        Editar Mascota
                    </h1>
                    <p class="mt-2 text-gray-600">
                        Complete el formulario para Editar mascota
                    </p>
                </div>

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
            </div>
        </div>
    </div>
</x-layouts.app>