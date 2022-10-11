<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DepensesPanier;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepensesPanierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the depensesPanier can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list depensespaniers');
    }

    /**
     * Determine whether the depensesPanier can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function view(User $user, DepensesPanier $model)
    {
        return $user->hasPermissionTo('view depensespaniers');
    }

    /**
     * Determine whether the depensesPanier can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create depensespaniers');
    }

    /**
     * Determine whether the depensesPanier can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function update(User $user, DepensesPanier $model)
    {
        return $user->hasPermissionTo('update depensespaniers');
    }

    /**
     * Determine whether the depensesPanier can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function delete(User $user, DepensesPanier $model)
    {
        return $user->hasPermissionTo('delete depensespaniers');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete depensespaniers');
    }

    /**
     * Determine whether the depensesPanier can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function restore(User $user, DepensesPanier $model)
    {
        return false;
    }

    /**
     * Determine whether the depensesPanier can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DepensesPanier  $model
     * @return mixed
     */
    public function forceDelete(User $user, DepensesPanier $model)
    {
        return false;
    }
}
