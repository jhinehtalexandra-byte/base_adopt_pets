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
                        Registrar Nueva Mascota
                    </h1>
                    <p class="mt-2 text-gray-600">
                        Complete el formulario para agregar una nueva mascota al sistema
                    </p>
                </div>

                <form action="{{ route('mascotas.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @include('mascotas._form', [
                        'mascota' => null,
                        'refugios' => $refugios,
                    ])
                    
                    <div class="pt-6 flex gap-3 border-t border-gray-200">
                        <button type="submit" class="btn-guardar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                            </svg>
                            Guardar Mascota
                        </button>
                        <a href="{{ route('mascotas.index') }}" class="btn-cancelar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            </svg>
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>