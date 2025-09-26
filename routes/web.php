<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mascotas\mascotasController;
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

// === RUTAS DE MASCOTAS PÚBLICAS ===
// Ver mascotas (público - cualquiera puede ver)
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

    //  Reportes - apunta directamente al método index del controlador
    Route::get('/mascotas/reportes', [MascotasController::class, 'index'])
        ->name('mascotas.reportes');

    //  Mis mascotas - apunta a la vista adopcion.blade.php
    Route::get('/adopcion', function () {
        return view('adopcion');
    })->name('adopcion');

    // === RUTAS DE ADOPCIÓN (NUEVAS) ===
    
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

    // Rutas públicas/ Página para adoptar (formulario de adopción estático) - apunta a la vista formulario_adopcion.blade.php
    Route::get('/mascotas', [mascotasController::class, 'index'])->name('mascotas.index');
    Route::get('/mascotas/{id}', [mascotasController::class, 'show'])->name('mascotas.show');

    // === GESTIÓN DE MASCOTAS (REQUIERE AUTH) ===
    
    // Página principal de mascotas (pública)
    Route::get('/mascotas', [mascotasController::class, 'index'])
    ->name('mascotas.index');

    // Mostrar mascota específica (pública)
    Route::get('/mascotas/{id}', [mascotasController::class, 'show'])
    ->name('mascotas.show');

    // Rutas protegidas (solo autenticados)
    Route::middleware('auth')->group(function () {
    // Formulario para crear mascota
    Route::get('/mascotas/create', [mascotasController::class, 'create'])
        ->name('mascotas.create');

    // Guardar nueva mascota
    Route::post('/mascotas', [mascotasController::class, 'store'])
        ->name('mascotas.store');

    // Formulario para editar mascota
    Route::get('/mascotas/{id}/edit', [mascotasController::class, 'edit'])
        ->name('mascotas.edit');

    // Actualizar mascota
    Route::put('/mascotas/{id}', [mascotasController::class, 'update'])
        ->name('mascotas.update');

    // Eliminar mascota
    Route::delete('/mascotas/{id}', [mascotasController::class, 'destroy'])
        ->name('mascotas.destroy');
});

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
