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
        //No pongo medicos como route resource porque voy a añadirle middlewares diferentes
        //'medicos' => MedicoController::class,
        'citas' => CitaController::class,
        'especialidads' => EspecialidadController::class,
        'pacientes' => PacienteController::class,
    ]);
    Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']);
    //Todos los usuarios pueden listar y ver el detalle de un médico
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('/medicos/{medico}', [MedicoController::class, 'show'])->name('medicos.show');
});

//Solo los administradores pueden crear y borrar médicos

Route::middleware(['auth', 'tipo_usuario:3'])->group(function () {
    Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::post('/medicos', [MedicoController::class, 'store'])->name('medicos.store');
    Route::delete('/medicos/{medico}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
});

//Tanto los médicos como los administradores pueden editar
Route::middleware(['auth', 'tipo_usuario:1,3'])->group(function () {
    Route::get('/medicos/{medico}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('/medicos/{medico}', [MedicoController::class, 'update'])->name('medicos.update');
});
