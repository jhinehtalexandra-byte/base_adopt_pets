<?php

use App\Http\Controllers\Mascotas\mascotasController;
use Illuminate\Support\Facades\Route;

// === RUTAS PÚBLICAS ===
// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('paginas.formulario_adopcion', function () {
    return view('paginas.formulario_adopcion');
})->name('formulario_adopcion');

Route::get('/mascotas', [mascotasController::class, 'index'])
    ->name('mascotas.index');


// Ruta para contáctanos
Route::get('/contactanos', function () {
    return view('auth.contactanos');
})->name('contactanos');

// Página de Refugios
Route::get('/refugios', function () {
    return view('auth.refugios');
})->name('refugios');

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
    // Agrega aquí todas las rutas que requieren autenticación
    
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

//Jose Velasquez - Formulario de adopcion

use App\Http\Controllers\AdopcionController;

// Jose Velasquez - Formulario de adopción
Route::get('/', function () {
    return view('formulario_adopcion'); 
});

