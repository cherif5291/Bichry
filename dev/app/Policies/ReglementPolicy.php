<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reglement;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReglementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the reglement can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list reglements');
    }

    /**
     * Determine whether the reglement can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function view(User $user, Reglement $model)
    {
        return $user->hasPermissionTo('view reglements');
    }

    /**
     * Determine whether the reglement can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create reglements');
    }

    /**
     * Determine whether the reglement can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function update(User $user, Reglement $model)
    {
        return $user->hasPermissionTo('update reglements');
    }

    /**
     * Determine whether the reglement can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function delete(User $user, Reglement $model)
    {
        return $user->hasPermissionTo('delete reglements');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete reglements');
    }

    /**
     * Determine whether the reglement can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function restore(User $user, Reglement $model)
    {
        return false;
    }

    /**
     * Determine whether the reglement can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reglement  $model
     * @return mixed
     */
    public function forceDelete(User $user, Reglement $model)
    {
        return false;
    }
}
