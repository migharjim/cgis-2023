<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_contratacion', 'vacunado', 'sueldo'];

    protected $casts = [
        'vacunado' => 'boolean',
        'fecha_contratacion' => 'datetime:Y-m-d'
    ];

    public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function pacientes(){
        return $this->hasManyThrough(Paciente::class, Cita::class);
    }

    public function getDiasContratadoAttribute(){
        return Carbon::now()->diffInDays($this->fecha_contratacion);
    }
}
