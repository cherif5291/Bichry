<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rupture;
use Illuminate\Auth\Access\HandlesAuthorization;

class RupturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the rupture can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list ruptures');
    }

    /**
     * Determine whether the rupture can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function view(User $user, Rupture $model)
    {
        return $user->hasPermissionTo('view ruptures');
    }

    /**
     * Determine whether the rupture can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create ruptures');
    }

    /**
     * Determine whether the rupture can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function update(User $user, Rupture $model)
    {
        return $user->hasPermissionTo('update ruptures');
    }

    /**
     * Determine whether the rupture can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function delete(User $user, Rupture $model)
    {
        return $user->hasPermissionTo('delete ruptures');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete ruptures');
    }

    /**
     * Determine whether the rupture can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function restore(User $user, Rupture $model)
    {
        return false;
    }

    /**
     * Determine whether the rupture can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Rupture  $model
     * @return mixed
     */
    public function forceDelete(User $user, Rupture $model)
    {
        return false;
    }
}
