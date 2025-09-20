<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mascotas\mascotasController;

// === RUTAS PÚBLICAS ===

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página para adoptar (formulario de adopción estático)
Route::get('/adoptar', function () {
    return view('paginas.formulario_adopcion');
})->name('adoptar');

// === RUTAS DE MASCOTAS ===
// Página principal de mascotas (pública)
Route::get('/mascotas', [mascotasController::class, 'index'])
    ->name('mascotas.index');

// Formulario para crear mascota (protegida)
Route::get('/mascotas/create', [mascotasController::class, 'create'])
    ->name('mascotas.create');

// Guardar nueva mascota (protegida)
Route::post('/mascotas', [mascotasController::class, 'store'])
    ->name('mascotas.store');

// Mostrar una mascota específica
Route::get('/mascotas/{id}', [mascotasController::class, 'show'])
    ->name('mascotas.show');

// Formulario para editar mascota (protegida)
Route::get('/mascotas/{id}/edit', [mascotasController::class, 'edit'])
    ->name('mascotas.edit');

// Actualizar mascota (protegida)
Route::put('/mascotas/{id}', [mascotasController::class, 'update'])
    ->name('mascotas.update');

// Eliminar mascota (protegida)
Route::delete('/mascotas/{id}', [mascotasController::class, 'destroy'])
    ->name('mascotas.destroy');

// Ruta para contáctanos
Route::get('/contactanos', function () {
    return view('auth.contactanos');
})->name('contactanos');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Página de Refugios
Route::get('/refugios', function () {
    return view('auth.refugios');
})->name('refugios');

Route::get('/blogadopt', function () {
    return view('blog.blogadopt');
})->name('blogadopt');

// Página de forgot
Route::get('/forgot', function () {
    return view('auth.forgot');
})->name('forgot');

// Otras rutas públicas (opcional)
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// === RUTAS PROTEGIDAS CON JETSTREAM ===
// Jetstream maneja automáticamente: /login, /register, /logout, etc.
// Solo define aquí las rutas que necesitan autenticación

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Solo si tienes verificación de email habilitada
])->group(function () {
    
    // Dashboard principal - Jetstream lo requiere
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // === TUS RUTAS PROTEGIDAS PERSONALIZADAS ===
    // Si quieres que algunas rutas de mascotas requieran autenticación, muévelas aquí
    // Por ejemplo, solo usuarios autenticados pueden crear/editar mascotas
    
    // Ejemplo: Gestión de perfil personalizada
    // Route::get('/mi-perfil', function () {
    //     return view('profile.custom');
    // })->name('profile.custom');
    
    // Ejemplo: Configuraciones
    // Route::get('/configuracion', function () {
    //     return view('settings.index');
    // })->name('settings');
    
    // Ejemplo: Rutas con controladores
    // Route::resource('posts', PostController::class);
    // Route::get('/mis-datos', [UserController::class, 'show'])->name('user.show');
});

// === RUTAS DE API (OPCIONAL) ===
// Solo si necesitas endpoints de API
Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    // Ejemplo de rutas de API protegidas
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
    
    // Route::apiResource('posts', PostController::class);
});