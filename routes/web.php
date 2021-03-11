<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::resources([
        'medicos' => MedicoController::class,
        'citas' => CitaController::class,
        'especialidads' => EspecialidadController::class,
        'pacientes' => PacienteController::class,
    ]);
    Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']);
});


