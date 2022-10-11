<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ContratsModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratsModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contratsModel can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list contratsmodels');
    }

    /**
     * Determine whether the contratsModel can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function view(User $user, ContratsModel $model)
    {
        return $user->hasPermissionTo('view contratsmodels');
    }

    /**
     * Determine whether the contratsModel can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create contratsmodels');
    }

    /**
     * Determine whether the contratsModel can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function update(User $user, ContratsModel $model)
    {
        return $user->hasPermissionTo('update contratsmodels');
    }

    /**
     * Determine whether the contratsModel can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function delete(User $user, ContratsModel $model)
    {
        return $user->hasPermissionTo('delete contratsmodels');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete contratsmodels');
    }

    /**
     * Determine whether the contratsModel can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function restore(User $user, ContratsModel $model)
    {
        return false;
    }

    /**
     * Determine whether the contratsModel can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsModel  $model
     * @return mixed
     */
    public function forceDelete(User $user, ContratsModel $model)
    {
        return false;
    }
}
