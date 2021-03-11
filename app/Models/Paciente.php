<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function citas(){
        return $this->hasMany(Cita::class);
    }

    public function medicos(){
        return $this->hasManyThrough(Medico::class, Cita::class);
    }

    public function getMedicamentosActualesAttribute(){
        $medicamentos_actuales = collect([]);
        foreach ($this->citas as $cita) {
            $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
            /* Alternativa
            if($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->exists()){
                $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
            }
            */
        }
        return $medicamentos_actuales;
    }
}
