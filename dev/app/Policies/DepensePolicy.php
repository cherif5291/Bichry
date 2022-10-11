<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Depense;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepensePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the depense can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list depenses');
    }

    /**
     * Determine whether the depense can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function view(User $user, Depense $model)
    {
        return $user->hasPermissionTo('view depenses');
    }

    /**
     * Determine whether the depense can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create depenses');
    }

    /**
     * Determine whether the depense can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function update(User $user, Depense $model)
    {
        return $user->hasPermissionTo('update depenses');
    }

    /**
     * Determine whether the depense can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function delete(User $user, Depense $model)
    {
        return $user->hasPermissionTo('delete depenses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete depenses');
    }

    /**
     * Determine whether the depense can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function restore(User $user, Depense $model)
    {
        return false;
    }

    /**
     * Determine whether the depense can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Depense  $model
     * @return mixed
     */
    public function forceDelete(User $user, Depense $model)
    {
        return false;
    }
}
