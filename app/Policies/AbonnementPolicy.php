<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Abonnement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbonnementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the abonnement can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list abonnements');
    }

    /**
     * Determine whether the abonnement can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function view(User $user, Abonnement $model)
    {
        return $user->hasPermissionTo('view abonnements');
    }

    /**
     * Determine whether the abonnement can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create abonnements');
    }

    /**
     * Determine whether the abonnement can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function update(User $user, Abonnement $model)
    {
        return $user->hasPermissionTo('update abonnements');
    }

    /**
     * Determine whether the abonnement can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function delete(User $user, Abonnement $model)
    {
        return $user->hasPermissionTo('delete abonnements');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete abonnements');
    }

    /**
     * Determine whether the abonnement can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function restore(User $user, Abonnement $model)
    {
        return false;
    }

    /**
     * Determine whether the abonnement can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Abonnement  $model
     * @return mixed
     */
    public function forceDelete(User $user, Abonnement $model)
    {
        return false;
    }
}
