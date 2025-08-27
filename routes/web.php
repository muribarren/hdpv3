<?php

use App\Http\Controllers\HdpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NuevoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController; // ¡IMPORTANTE! Añade esta línea para tu controlador Formulario


Route::get('/', [HdpController::class, 'mostrarHdps'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/dashboard', [HdpController::class, 'mostrarHdps'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tus rutas del formulario (¡CRUCIALES!)
    //Route::get('/formulario', [FormularioController::class, 'mostrarFormulario'])->name('mostrar.formulario');
    //Route::post('/formulario', [FormularioController::class, 'procesar'])->name('procesar.formulario');


    //Rutas HDP
    //Mostrar todos los HDP en la página de inicio
    Route::get('/hdp', [HdpController::class, 'mostrarHdps'])->name('hdps');
    
    //Mostrar un HDP concreto
    Route::get('/hdp/{num}/{rev}', [HdpController::class, 'mostrarHdp'])->name('hdp');
    Route::post('/hdp', [HdpController::class, 'procesar'])->name('procesar');
    Route::post('/hdp/rechazar', [HdpController::class, 'rechazar'])->name('rechazar');
    Route::post('/hdp/devolver', [HdpController::class, 'devolver'])->name('devolver');


    Route::get('/nuevo', [NuevoController::class, 'crearHdp'])->name('nuevo');
    Route::post('/nuevo', [NuevoController::class, 'procesar'])->name('procesar.nuevo');

    

});

require __DIR__.'/auth.php'; // Esto carga todas las rutas de login, register, etc.

// --- TUS RUTAS PERSONALIZADAS (AÑÁDELAS AQUÍ) ---

// Tu ruta raíz personalizada si quieres que 'inicio' sea la página principal
// Si prefieres 'welcome' como raíz, puedes comentar o eliminar la de abajo
// Route::get('/', function () {
//     return view('inicio');
// });



