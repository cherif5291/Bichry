<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Habilitation;
use Illuminate\Auth\Access\HandlesAuthorization;

class HabilitationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the habilitation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list habilitations');
    }

    /**
     * Determine whether the habilitation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function view(User $user, Habilitation $model)
    {
        return $user->hasPermissionTo('view habilitations');
    }

    /**
     * Determine whether the habilitation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create habilitations');
    }

    /**
     * Determine whether the habilitation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function update(User $user, Habilitation $model)
    {
        return $user->hasPermissionTo('update habilitations');
    }

    /**
     * Determine whether the habilitation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function delete(User $user, Habilitation $model)
    {
        return $user->hasPermissionTo('delete habilitations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete habilitations');
    }

    /**
     * Determine whether the habilitation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function restore(User $user, Habilitation $model)
    {
        return false;
    }

    /**
     * Determine whether the habilitation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Habilitation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Habilitation $model)
    {
        return false;
    }
}
