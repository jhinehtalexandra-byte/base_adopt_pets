<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mascotas\MascotasController;
use App\Http\Controllers\MisMascotasController;
use App\Http\Controllers\AdopcionController; // Agregar cuando crees el controlador


// ================================
// === RUTAS PÚBLICAS (SIN AUTH) ===
// ================================

// Página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas adicionales de welcome (públicas)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// === RUTAS PARA LA NAVEGACIÓN DE WELCOME.BLADE.PHP ===

// Blog público (lista de posts)
Route::get('/blog', function () {
    return view('blog.blogadopt');
})->name('blog');

// Contactanos público
Route::get('/contactanos', function () {
    return view('profile.contactanos');
})->name('contactanos');

// Quienes somos (público)
Route::get('/quienes-somos', function () {
    return view('profile.quienes-somos');
})->name('quienes-somos');

// === RUTAS DE ADOPCIÓN PÚBLICAS ===

// Página de adopción (mostrar todas las mascotas disponibles)
Route::get('/adopcion', function () {
    return view('adopcion');
})->name('adopcion');

// === RUTAS DE MASCOTAS PÚBLICAS ===

// Ver mascotas (público - datatable administrativo)
Route::get('/mascotas', [MascotasController::class, 'index'])
    ->name('mascotas.index');

// Ver una mascota específica (público)
Route::get('/mascotas/{id}', [MascotasController::class, 'show'])
    ->name('mascotas.show');

// =====================================
// === RUTAS PROTEGIDAS (CON AUTH) ===
// =====================================

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Solo si tienes verificación de email habilitada
])->group(function () {
    
    // === DASHBOARD PRINCIPAL ===
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // === RUTAS PARA LA NAVEGACIÓN DEL DASHBOARD.BLADE.PHP ===
    
    // Página para Refugios
    Route::get('/refugios', function () {
        return view('profile.refugios');
    })->name('refugios');

    // Mis mascotas - Panel del usuario con sus solicitudes
    Route::get('/mis-mascotas', [MisMascotasController::class, 'index'])
        ->name('mis-mascotas');

    // === RUTAS DE ADOPCIÓN (AUTENTICADAS) ===
    
    // Formulario de adopción para mascota específica
    Route::get('/adopcion/{mascota}', function ($mascota) {
        // Buscar la mascota o usar datos por defecto
        $mascotaData = (object) [
            'id_mascota' => $mascota, 
            'nombre' => "Mascota #{$mascota}"
        ];
        return view('paginas.formulario_adopcion', compact('mascotaData'));
    })->name('adopcion.formulario');

    // Procesar formulario de adopción (cuando tengas el controlador)
    Route::post('/adopcion/store', function(\Illuminate\Http\Request $request) {
        // Temporal hasta que crees AdopcionController
        return back()->with('success', 'Solicitud de adopción recibida. Te contactaremos pronto.');
    })->name('adopcion.store');

    // === RUTAS DE REPORTES ===


    // Página principal de reportes
    Route::get('/reportes', function () {
    return view('reportes'); // Cambiar de string a vista
    })->name('reportes');

    // Botón de mascotas va al controlador existente
    Route::get('/reportes/mascotas', [MascotasController::class, 'index'])->name('reportes.mascotas');

    // Las otras dos en desarrollo
    Route::get('/reportes/adoptantes', function () {
    return redirect()->route('reportes')->with('info', 'Sección en desarrollo');
    })->name('reportes.adoptantes');

    Route::get('/reportes/refugios', function () {
    return redirect()->route('reportes')->with('info', 'Sección en desarrollo');
    })->name('reportes.refugios');

    // === GESTIÓN DE MASCOTAS (REQUIERE AUTH) ===
    
    // Formulario para crear mascota
    Route::get('/mascotas/create', [MascotasController::class, 'create'])
        ->name('mascotas.create');

    // Guardar nueva mascota
    Route::post('/mascotas', [MascotasController::class, 'store'])
        ->name('mascotas.store');

    // Formulario para editar mascota
    Route::get('/mascotas/{id}/edit', [MascotasController::class, 'edit'])
        ->name('mascotas.edit');

    // Actualizar mascota
    Route::put('/mascotas/{id}', [MascotasController::class, 'update'])
        ->name('mascotas.update');

    // Eliminar mascota
    Route::delete('/mascotas/{id}', [MascotasController::class, 'destroy'])
        ->name('mascotas.destroy');
});

// ===================================
// === RUTAS DE FALLBACK/ERROR ===
// ===================================

// Ruta forgot
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

// Ruta para manejar errores 404 personalizados (opcional)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});