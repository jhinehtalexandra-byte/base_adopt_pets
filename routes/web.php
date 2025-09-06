<?php

use Illuminate\Support\Facades\Route;

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Ruta para mostrar el formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Ruta para procesar el login (POST)
Route::post('/login', function () {
    // Aquí irá la lógica de autenticación
    // Por ahora solo redirige de vuelta
    return back()->with('error', 'Función de login aún no implementada');
})->name('login');