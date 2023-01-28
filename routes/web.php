<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\MedicamentoController;
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
        'citas' => CitaController::class,
        'especialidads' => EspecialidadController::class,
        'pacientes' => PacienteController::class,
    ]);
    Route::get('/pacientes-hoy', [PacienteController::class, 'pacientesHoy']);
});

//Solo los administradores pueden crear y borrar médicos, así como trabajar con el CRUD de Medicamentos
Route::middleware(['auth', 'tipo_usuario:3'])->group(function () {
    Route::resources([
        'medicamentos' => MedicamentoController::class,
    ]);
});

//Tanto los médicos como los administradores pueden editar el médico y trabajar con los medicamentos de las citas
Route::middleware(['auth', 'tipo_usuario:1,3'])->group(function () {
    //Dos rutas que tienen además un middleware con un Policy para hilar fino
    Route::post('/citas/{cita}/attach-medicamento', [CitaController::class, 'attach_medicamento'])
        ->name('citas.attachMedicamento')
        ->middleware('can:attach_medicamento,cita');
    Route::delete('/citas/{cita}/detach-medicamento/{medicamento}', [CitaController::class, 'detach_medicamento'])
        ->name('citas.detachMedicamento')
        ->middleware('can:detach_medicamento,cita');
});
