<x-layouts.app :title="'Mi mascotas'" bodyClass="mismascotas">

    @push('extra-css')
    <link rel="stylesheet" href="{{ asset('css/mismascotas.css') }}">
    @endpush

    <div class="main-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header de página -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ __('Mis Mascotas') }}</h1>
                <p class="text-gray-600">{{ __('Gestiona tus solicitudes de adopción y mascotas adoptadas') }}</p>
            </div>

            <!-- Estadísticas rápidas -->
            @php
                // Convertir objetos stdClass a arrays si es necesario
                $adopciones = isset($adopciones) ? json_decode(json_encode($adopciones), true) : [];
                $mascotas = isset($mascotas) ? json_decode(json_encode($mascotas), true) : [];
                $refugios = isset($refugios) ? json_decode(json_encode($refugios), true) : [];
                $seguimientos = isset($seguimientos) ? json_decode(json_encode($seguimientos), true) : [];

                // Conteos basados en los datos reales
                $totalSolicitudes = collect($adopciones)->count();
                $pendientes = collect($adopciones)->where('estado_adopcion', 'pendiente')->count();
                $aprobadas = collect($adopciones)->where('estado_adopcion', 'aprobada')->count();
                $completadas = collect($adopciones)->where('estado_adopcion', 'completada')->count();
                $rechazadas = collect($adopciones)->where('estado_adopcion', 'rechazada')->count();
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">{{ __('Pendientes') }}</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $pendientes }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">{{ __('Aprobadas') }}</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $aprobadas }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">{{ __('Completadas') }}</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $completadas }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">{{ __('Rechazadas') }}</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $rechazadas }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <div class="flex flex-wrap gap-4 items-center">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Estado') }}</label>
                        <select class="border border-gray-300 rounded-lg px-3 py-2" id="filtro-estado">
                            <option value="">{{ __('Todos los estados') }}</option>
                            <option value="pendiente">{{ __('Pendiente') }}</option>
                            <option value="aprobada">{{ __('Aprobada') }}</option>
                            <option value="completada">{{ __('Completada') }}</option>
                            <option value="rechazada">{{ __('Rechazada') }}</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Especie') }}</label>
                        <select class="border border-gray-300 rounded-lg px-3 py-2" id="filtro-especie">
                            <option value="">{{ __('Todas las especies') }}</option>
                            <option value="perro">{{ __('Perro') }}</option>
                            <option value="gato">{{ __('Gato') }}</option>
                            <option value="conejo">{{ __('Conejo') }}</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ __('Buscar') }}</label>
                        <input type="text" placeholder="{{ __('Nombre de mascota...') }}" class="border border-gray-300 rounded-lg px-3 py-2" id="buscar-mascota">
                    </div>
                    
                    <div class="ml-auto">
                        <a href="{{ route('adopcion') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                            {{ __('Nueva Solicitud') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Lista de mascotas adoptadas/en proceso -->
            <div class="space-y-4">
                @forelse($adopciones as $adopcion)
                    @php
                        $mascota = collect($mascotas)->where('id', $adopcion['id_mascota'])->first();
                        if (!$mascota) continue;
                        
                        $refugio = collect($refugios)->where('id', $mascota['id_refugio'])->first();
                        $fechaSolicitud = date('d M Y', strtotime($adopcion['fecha_solicitud']));
                        
                        // Clases CSS según estado
                        $estadoClass = 'estado-' . $adopcion['estado_adopcion'];
                        $badgeClass = 'badge-' . $adopcion['estado_adopcion'];
                        
                        // Emoji según especie
                        $emoji = match($mascota['especie']) {
                            'perro' => '🐕',
                            'gato' => '🐱', 
                            'conejo' => '🐰',
                            default => '🐾'
                        };
                    @endphp
                    
                    <div class="bg-white rounded-lg shadow-sm p-6 {{ $estadoClass }}" data-estado="{{ $adopcion['estado_adopcion'] }}" data-especie="{{ $mascota['especie'] }}" data-nombre="{{ strtolower($mascota['nombre']) }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <!-- Imagen placeholder con emoji -->
                                <div class="w-20 h-20 bg-green-100 rounded-lg flex items-center justify-center text-3xl">
                                    {{ $emoji }}
                                </div>
                                
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2">
                                        <h3 class="text-xl font-semibold text-gray-900 capitalize">{{ $mascota['nombre'] }}</h3>
                                        <span class="px-2 py-1 text-xs font-medium rounded-full {{ $badgeClass }}">
                                            {{ strtoupper($adopcion['estado_adopcion']) }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 capitalize">
                                        {{ $mascota['especie'] }} • {{ $mascota['edad_aproximada'] }} {{ __('años') }} • {{ $mascota['raza'] }}
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        {{ __('Refugio:') }} <strong>{{ $refugio['nombre'] ?? 'N/A' }}</strong>
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        {{ __('Solicitud:') }} <strong>{{ $fechaSolicitud }}</strong>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Acciones según estado -->
                            <div class="flex space-x-2">
                                @switch($adopcion['estado_adopcion'])
                                    @case('pendiente')
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Ver Detalles') }}
                                        </button>
                                        <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Contactar') }}
                                        </button>
                                        @break
                                        
                                    @case('aprobada')
                                        <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Confirmar Adopción') }}
                                        </button>
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Contactar Refugio') }}
                                        </button>
                                        @break
                                        
                                    @case('completada')
                                        <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Ver Certificado') }}
                                        </button>
                                        <button class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Seguimiento') }}
                                        </button>
                                        @break
                                        
                                    @case('rechazada')
                                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Ver Motivo') }}
                                        </button>
                                        <a href="{{ route('adopcion') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                            {{ __('Nueva Solicitud') }}
                                        </a>
                                        @break
                                @endswitch
                            </div>
                        </div>
                        
                        <!-- Información adicional según estado -->
                        <div class="mt-4 rounded-lg p-3" style="background-color: {{ $adopcion['estado_adopcion'] === 'pendiente' ? '#fef3c7' : ($adopcion['estado_adopcion'] === 'aprobada' ? '#d1fae5' : ($adopcion['estado_adopcion'] === 'completada' ? '#dbeafe' : '#fecaca')) }}">
                            @switch($adopcion['estado_adopcion'])
                                @case('pendiente')
                                    <p class="text-yellow-800 text-sm">
                                        <strong>{{ __('Estado:') }}</strong> {{ __('Tu solicitud está siendo revisada por el refugio. Te contactaremos pronto.') }}
                                        @if(isset($adopcion['observaciones']) && $adopcion['observaciones'])
                                            <br><strong>{{ __('Observaciones:') }}</strong> {{ $adopcion['observaciones'] }}
                                        @endif
                                    </p>
                                    @break
                                    
                                @case('aprobada')
                                    <p class="text-green-800 text-sm">
                                        <strong>{{ __('¡Felicidades!') }}</strong> {{ __('Tu solicitud fue aprobada. Contacta al refugio para coordinar la entrega.') }}
                                        @if(isset($adopcion['observaciones']) && $adopcion['observaciones'])
                                            <br><strong>{{ __('Observaciones:') }}</strong> {{ $adopcion['observaciones'] }}
                                        @endif
                                    </p>
                                    @break
                                    
                                @case('completada')
                                    <p class="text-blue-800 text-sm">
                                        <strong>{{ __('Adopción completada exitosamente.') }}</strong> 
                                        {{ __('Gracias por darle un hogar a') }} {{ $mascota['nombre'] }}. 
                                        @if(isset($adopcion['observaciones']) && $adopcion['observaciones'])
                                            <br><strong>{{ __('Observaciones:') }}</strong> {{ $adopcion['observaciones'] }}
                                        @endif
                                    </p>
                                    @break
                                    
                                @case('rechazada')
                                    <p class="text-red-800 text-sm">
                                        <strong>{{ __('Solicitud no aprobada.') }}</strong>
                                        @if(isset($adopcion['observaciones']) && $adopcion['observaciones'])
                                            <br><strong>{{ __('Motivo:') }}</strong> {{ $adopcion['observaciones'] }}
                                        @endif
                                        <br>{{ __('Puedes enviar una nueva solicitud para otra mascota.') }}
                                    </p>
                                    @break
                            @endswitch
                        </div>
                    </div>
                @empty
                    <!-- Estado vacío -->
                    <div class="text-center py-12">
                        <div class="text-6xl mb-4">🐾</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('No tienes solicitudes de adopción') }}</h3>
                        <p class="text-gray-600 mb-6">{{ __('¡Encuentra tu compañero perfecto y envía tu primera solicitud!') }}</p>
                        <a href="{{ route('adopcion') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                            {{ __('Explorar Mascotas') }}
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Información de seguimientos si existen -->
            @if(isset($seguimientos) && count($seguimientos) > 0)
                <div class="mt-8 bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Seguimientos Recientes') }}</h3>
                    <div class="space-y-4">
                        @foreach($seguimientos as $seguimiento)
                            @php
                                $mascotaSeguimiento = collect($mascotas)->where('id', $seguimiento['id_mascota'])->first();
                            @endphp
                            <div class="border-l-4 border-blue-400 pl-4">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="font-semibold text-gray-900 capitalize">{{ $mascotaSeguimiento['nombre'] ?? 'N/A' }}</h4>
                                        <p class="text-sm text-gray-600">{{ $seguimiento['tipo_seguimiento'] }} - {{ date('d M Y', strtotime($seguimiento['fecha_seguimiento'])) }}</p>
                                        <p class="text-sm text-gray-700 mt-1">{{ $seguimiento['observaciones'] }}</p>
                                    </div>
                                    <span class="text-sm text-green-600 font-medium">{{ $seguimiento['estado_mascota'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    

    <!-- JavaScript para filtros -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filtroEstado = document.getElementById('filtro-estado');
            const filtroEspecie = document.getElementById('filtro-especie');
            const buscarInput = document.getElementById('buscar-mascota');
            const tarjetas = document.querySelectorAll('[data-estado]');

            function filtrar() {
                const estadoSeleccionado = filtroEstado.value.toLowerCase();
                const especieSeleccionada = filtroEspecie.value.toLowerCase();
                const textoBusqueda = buscarInput.value.toLowerCase();

                tarjetas.forEach(tarjeta => {
                    const estado = tarjeta.dataset.estado;
                    const especie = tarjeta.dataset.especie;
                    const nombre = tarjeta.dataset.nombre;

                    const cumpleEstado = !estadoSeleccionado || estado === estadoSeleccionado;
                    const cumpleEspecie = !especieSeleccionada || especie === especieSeleccionada;
                    const cumpleNombre = !textoBusqueda || nombre.includes(textoBusqueda);

                    if (cumpleEstado && cumpleEspecie && cumpleNombre) {
                        tarjeta.style.display = 'block';
                    } else {
                        tarjeta.style.display = 'none';
                    }
                });
            }

            filtroEstado.addEventListener('change', filtrar);
            filtroEspecie.addEventListener('change', filtrar);
            buscarInput.addEventListener('input', filtrar);
        });
    </script>
</x-layouts.app>