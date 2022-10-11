<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Revenu;
use Illuminate\Auth\Access\HandlesAuthorization;

class RevenuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the revenu can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list revenus');
    }

    /**
     * Determine whether the revenu can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function view(User $user, Revenu $model)
    {
        return $user->hasPermissionTo('view revenus');
    }

    /**
     * Determine whether the revenu can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create revenus');
    }

    /**
     * Determine whether the revenu can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function update(User $user, Revenu $model)
    {
        return $user->hasPermissionTo('update revenus');
    }

    /**
     * Determine whether the revenu can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function delete(User $user, Revenu $model)
    {
        return $user->hasPermissionTo('delete revenus');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete revenus');
    }

    /**
     * Determine whether the revenu can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function restore(User $user, Revenu $model)
    {
        return false;
    }

    /**
     * Determine whether the revenu can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Revenu  $model
     * @return mixed
     */
    public function forceDelete(User $user, Revenu $model)
    {
        return false;
    }
}
