<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Grupo de rutas que requieren que el usuario haya iniciado sesión
Route::middleware('auth')->group(function () {

    // Ruta del dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // --- RUTAS DE PERFIL ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- RUTAS DE ALQUILERES ---
    Route::get('/alquileres', [AlquilerController::class, 'index'])->name('alquileres.index');
    Route::get('/alquileres/crear', [AlquilerController::class, 'create'])->name('alquileres.create');
    Route::post('/alquileres', [AlquilerController::class, 'store'])->name('alquileres.store');

    Route::get('/alquileres/{alquiler}', [AlquilerController::class, 'show'])->name('alquileres.show'); 

    Route::post('/alquileres/{alquiler}/estado', [AlquilerController::class, 'updateStatus'])->name('alquileres.updateStatus');

    Route::post('/alquileres/previsualizar', [AlquilerController::class, 'preview'])->name('alquileres.preview');

});

// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';
