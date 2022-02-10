<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CitaPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function view(User $user, Cita $cita)
    {
        return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $cita->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $cita->medico_id == $user->medico->id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function update(User $user, Cita $cita)
    {
        return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $cita->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $cita->medico_id == $user->medico->id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cita  $cita
     * @return mixed
     */
    public function delete(User $user, Cita $cita)
    {
        return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $cita->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $cita->medico_id == $user->medico->id);
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

    public function attach_medicamento(User $user, Cita $cita)
    {
        return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 1 && $cita->medico_id == $user->medico->id);
    }

    public function detach_medicamento(User $user, Cita $cita)
    {
        return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 1 && $cita->medico_id == $user->medico->id);
    }
}
