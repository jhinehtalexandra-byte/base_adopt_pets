<?php

use App\Http\Controllers\Adoptantes\AdoptantesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mascotas\mascotasController;
use App\Http\Controllers\Refugios\RefugiosController;


// === RUTAS PÚBLICAS ===

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Página para adoptar (formulario de adopción estático)
Route::get('/adopcion', function () {
    return view('adopcion');
})->name('adopcion');

Route::get('/contactanos', function () {
    return view('paginas.contactanos');
})->name('contactanos');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Página de Refugios
Route::get('/refugios', function () {
    return view('paginas.refugios');
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

Route::get('/formulario-adopcion', function(){
    return view('paginas.formulario-adopcion');
})->name('formulario');

// rutas privadas

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Dashboard principal - Jetstream lo requiere
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //ruta refugios 
   Route::resource('refugios-admin',RefugiosController::class)
    ->names('refugios-admin')
    ->parameters(['refugio-admin' => 'refugio']);
    // ruta mascotas
    Route::resource('masco',mascotasController::class)
    ->names('mascotas');
    // ruta mascotas
    Route::resource('usuarios',AdoptantesController::class)
    ->names('usuarios');
});


Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    // Ejemplo de rutas de API protegidas
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
    
    // Route::apiResource('posts', PostController::class);
});