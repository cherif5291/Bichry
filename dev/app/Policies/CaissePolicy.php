<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Caisse;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaissePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the caisse can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list caisses');
    }

    /**
     * Determine whether the caisse can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function view(User $user, Caisse $model)
    {
        return $user->hasPermissionTo('view caisses');
    }

    /**
     * Determine whether the caisse can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create caisses');
    }

    /**
     * Determine whether the caisse can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function update(User $user, Caisse $model)
    {
        return $user->hasPermissionTo('update caisses');
    }

    /**
     * Determine whether the caisse can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function delete(User $user, Caisse $model)
    {
        return $user->hasPermissionTo('delete caisses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete caisses');
    }

    /**
     * Determine whether the caisse can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function restore(User $user, Caisse $model)
    {
        return false;
    }

    /**
     * Determine whether the caisse can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Caisse  $model
     * @return mixed
     */
    public function forceDelete(User $user, Caisse $model)
    {
        return false;
    }
}
