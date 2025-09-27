<script src="https://cdn.tailwindcss.com"></script>
<div class="welcome-pagina">
    <div class="main-content">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Saludo personalizado -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 overflow-hidden shadow-xl sm:rounded-lg mb-6">
                    <div class="p-6 text-white">
                        <h3 class="text-2xl font-bold">{{ __('¡Bienvenido de vuelta, :name!', ['name' => Auth::user()->name]) }}</h3>
                        <p class="text-green-100 mt-2">{{ __('Encuentra tu compañero perfecto y cambia una vida para siempre') }}</p>
                    </div>
                </div>

    <!-- Navegación principal del dashboard - CORREGIDA -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Adoptar - CORREGIDO -->
        <a href="{{ route('mascotas.create') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Adoptar') }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ __('Encuentra tu mascota ideal') }}</p>
            </div>
        </a>

        <!-- Refugios - CORREGIDO -->
        <a href="{{ route('refugios') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Refugios') }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ __('Explora refugios cercanos') }}</p>
            </div>
        </a>

        <!-- Mis Mascotas - TEMPORALMENTE REDIRECT A ADOPCIÓN -->
        <a href="{{ route('mis-mascotas') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Mis Mascotas') }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ __('Gestiona mascotas') }}</p>
            </div>
        </a>

        <!-- Reportes - CORREGIDO -->
        <a href="{{ route('reportes') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Reportes') }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ __('Ver estadísticas') }}</p>
            </div>
        </a>

        <!-- Mi Perfil - SIN CAMBIOS -->
        <a href="{{ route('profile.show') }}" class="bg-white overflow-hidden shadow-xl sm:rounded-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
            <div class="p-6 text-center">
                <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">{{ __('Mi Perfil') }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ __('Edita tu información') }}</p>
            </div>
        </a>
    </div>

    <!-- Contenido principal del dashboard -->
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!-- Panel interno con el contenido del dashboard -->
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Panel izquierdo - Actividad reciente y favoritos -->
                <div class="lg:col-span-2">
                    <!-- Mascotas recomendadas para ti -->
                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ __('Mascotas recomendadas para ti') }}</h3>
                            <a href="{{ route('adopcion') }}" class="text-green-600 hover:text-green-800 font-medium">{{ __('Ver todas') }}</a>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Mascota ejemplo 1 -->
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMTUwIiBmaWxsPSIjMjJjNTVlIi8+CiAgICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPuKUvSBNYXg8L3RleHQ+Cjwvc3ZnPg==" 
                                    alt="Max" class="w-full h-32 object-cover rounded-lg mb-3">
                                <h4 class="font-semibold text-gray-900">Max</h4>
                                <p class="text-sm text-gray-600">{{ __('Perro • 2 años • Mestizo') }}</p>
                                <p class="text-sm text-gray-500 mt-1">{{ __('Refugio San Francisco') }}</p>
                                <button class="mt-3 w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition-colors">
                                    {{ __('Conocer más') }}
                                </button>
                            </div>

                            <!-- Mascota ejemplo 2 -->
                            <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMTUwIiBmaWxsPSIjMjJjNTVlIi8+CiAgICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1mYW1pbHk9IkFyaWFsIiBmb250LXNpemU9IjE0IiBmaWxsPSJ3aGl0ZSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPuKUvSBMdW5hPC90ZXh0Pgo8L3N2Zz4=" 
                                    alt="Luna" class="w-full h-32 object-cover rounded-lg mb-3">
                                <h4 class="font-semibold text-gray-900">Luna</h4>
                                <p class="text-sm text-gray-600">{{ __('Gata • 1 año • Siamés') }}</p>
                                <p class="text-sm text-gray-500 mt-1">{{ __('Refugio Esperanza') }}</p>
                                <button class="mt-3 w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition-colors">
                                    {{ __('Conocer más') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Mis solicitudes de adopción -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Mis Solicitudes de Adopción') }}</h3>
                        
                        <!-- Ejemplo con solicitudes -->
                        <div class="space-y-4">
                            <!-- Solicitud en proceso -->
                            <div class="border border-gray-200 rounded-lg p-4 bg-yellow-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgICA8cmVjdCB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIGZpbGw9IiMyMmM1NWUiLz4KICAgIDx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjQiIGZpbGw9IndoaXRlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+4pS0PC90ZXh0Pgo8L3N2Zz4=" 
                                            alt="Rocky" class="w-15 h-15 rounded-lg object-cover">
                                        <div>
                                            <h4 class="font-semibold text-gray-900">Rocky</h4>
                                            <p class="text-sm text-gray-600">{{ __('Refugio Los Andes') }}</p>
                                            <p class="text-sm text-gray-500">{{ __('Enviada el 20 Sept 2025') }}</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">{{ __('En revisión') }}</span>
                                </div>
                            </div>

                            <!-- Solicitud aprobada -->
                            <div class="border border-gray-200 rounded-lg p-4 bg-green-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgICA8cmVjdCB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIGZpbGw9IiMyMmM1NWUiLz4KICAgIDx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMjQiIGZpbGw9IndoaXRlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+4pSxPC90ZXh0Pgo8L3N2Zz4=" 
                                            alt="Mimi" class="w-15 h-15 rounded-lg object-cover">
                                        <div>
                                            <h4 class="font-semibold text-gray-900">Mimi</h4>
                                            <p class="text-sm text-gray-600">{{ __('Refugio Ciudad') }}</p>
                                            <p class="text-sm text-gray-500">{{ __('Aprobada el 15 Sept 2025') }}</p>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">{{ __('Aprobada') }}</span>
                                </div>
                            </div>

                        <!-- Botón para nueva solicitud - CORREGIDO -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('mascotas.create') }}" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                {{ __('Nueva solicitud') }}
                            </a>
                        </div>
                    </div>

                    <!-- Actividad Reciente -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Actividad Reciente') }}</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">{{ __('Agregaste a :name a favoritos', ['name' => 'Toby']) }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Hace 2 horas') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">{{ __('Enviaste solicitud para :name', ['name' => 'Rocky']) }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Hace 1 día') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">{{ __('Actualizaste tu perfil') }}</p>
                                    <p class="text-xs text-gray-500">{{ __('Hace 3 días') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel derecho - Información rápida -->
                <div class="space-y-6">
                    <!-- Estadísticas personales -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Mis Estadísticas') }}</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ __('Favoritos') }}</p>
                                        <p class="text-xs text-gray-500">{{ __('Mascotas guardadas') }}</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">5</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ __('Solicitudes') }}</p>
                                        <p class="text-xs text-gray-500">{{ __('Total enviadas') }}</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-gray-900">3</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ __('Aprobadas') }}</p>
                                        <p class="text-xs text-gray-500">{{ __('Adopciones exitosas') }}</p>
                                    </div>
                                </div>
                                <span class="text-2xl font-bold text-green-600">1</span>
                            </div>
                        </div>
                    </div>

                    <!-- Notificaciones -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Notificaciones') }}</h3>
                        
                        <div class="space-y-3">
                            <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">{{ __('¡Adopción aprobada!') }}</p>
                                        <p class="text-xs text-green-700">{{ __('Tu solicitud para Mimi fue aprobada') }}</p>
                                        <p class="text-xs text-green-600 mt-1">{{ __('Hace 2 horas') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-blue-800">{{ __('Nuevas mascotas') }}</p>
                                        <p class="text-xs text-blue-700">{{ __('3 mascotas que podrían interesarte') }}</p>
                                        <p class="text-xs text-blue-600 mt-1">{{ __('Hace 1 día') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 text-center">
                            <a href="#" class="text-sm text-green-600 hover:text-green-800 font-medium">{{ __('Ver todas las notificaciones') }}</a>
                        </div>
                    </div>

                    <!-- Acciones Rápidas -->
                    <div >
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Acciones Rápidas') }}</h3>
                        
                        <div class="space-y-3">
                            <a href="{{ route('mascotas.create') }}" class="block w-full bg-green-500 text-white text-center py-2 px-4 rounded-lg hover:bg-green-600 transition-colors">
                                {{ __('Solicitar Adopción') }}
                            </a>
                            
                            <a href="{{ route('contactanos') }}" class="block w-full bg-blue-500 text-white text-center py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                                {{ __('Contacto') }}
                            </a>
                            
                            <a href="{{ route('blogadopt') }}" class="block w-full bg-purple-500 text-white text-center py-2 px-4 rounded-lg hover:bg-purple-600 transition-colors">
                                {{ __('Ver Blog') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
