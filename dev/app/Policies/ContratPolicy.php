<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contrat;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contrat can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list contrats');
    }

    /**
     * Determine whether the contrat can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function view(User $user, Contrat $model)
    {
        return $user->hasPermissionTo('view contrats');
    }

    /**
     * Determine whether the contrat can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create contrats');
    }

    /**
     * Determine whether the contrat can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function update(User $user, Contrat $model)
    {
        return $user->hasPermissionTo('update contrats');
    }

    /**
     * Determine whether the contrat can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function delete(User $user, Contrat $model)
    {
        return $user->hasPermissionTo('delete contrats');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete contrats');
    }

    /**
     * Determine whether the contrat can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function restore(User $user, Contrat $model)
    {
        return false;
    }

    /**
     * Determine whether the contrat can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Contrat  $model
     * @return mixed
     */
    public function forceDelete(User $user, Contrat $model)
    {
        return false;
    }
}
