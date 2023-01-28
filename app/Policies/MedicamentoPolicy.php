<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\Especialidad;
use App\Models\Medicamento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicamentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

    public function viewAny(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function view(User $user, Medicamento $medicamento)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

    public function create(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function update(User $user, Medicamento $medicamento)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function delete(User $user, Medicamento $medicamento)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    /*
    public function restore(User $user, Cita $cita)
    {
        //
    }
    */
    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */

    /*
    public function forceDelete(User $user, Cita $cita)
    {
        //
    }
    */
}
